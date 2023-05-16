package com.example.kfc_chainstores_mobile;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

import com.example.kfc_chainstores_mobile.adapters.DatMonAdapter;
import com.example.kfc_chainstores_mobile.database.GioHangHelper;
import com.example.kfc_chainstores_mobile.model.CuaHang;
import com.example.kfc_chainstores_mobile.model.MonAn;
import com.google.android.material.textfield.TextInputEditText;
import com.google.android.material.textfield.TextInputLayout;

import org.jetbrains.annotations.NotNull;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.List;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class DatMonActivity extends AppCompatActivity {

    TextInputLayout textInputLayout;
    TextInputEditText diaChi;
    TextView tenCuaHang, chiNhanh, tongtien;
    Button datNgay;
    RadioGroup ptThanhToan;
    RadioButton ttTrucTiep, ttOnline;

    RecyclerView chiTietDatMon;
    DatMonAdapter adapter;
    List<MonAn> monAnList;

    GioHangHelper gioHangHelper;
    SharedPreferences sharedPreferences;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_dat_mon);

        getSupportActionBar().setTitle("Đặt món");

        gioHangHelper = new GioHangHelper(this, null);
        sharedPreferences = getSharedPreferences("donhang", MODE_PRIVATE);

        textInputLayout = findViewById(R.id.layout_diachi);
        diaChi = findViewById(R.id.edtxt_diaChi);
        tenCuaHang = findViewById(R.id.tv_tenCuaHang_dm);
        chiNhanh = findViewById(R.id.tv_chiNhanh_dm);
        tongtien = findViewById(R.id.tv_tongtien_dm);
        datNgay = findViewById(R.id.btn_datNgay_dm);
        ptThanhToan = findViewById(R.id.rg_pttt_dm);
        ttTrucTiep = findViewById(R.id.rb_ttTrucTiep_dm);
        ttOnline = findViewById(R.id.rb_ttOnline_dm);

        tenCuaHang.setText(sharedPreferences.getString("tenCuaHang", "KFC 0"));
        chiNhanh.setText(sharedPreferences.getString("chiNhanh", "Quận 0"));
        ttTrucTiep.setChecked(true);

        chiTietDatMon = findViewById(R.id.rcv_chiTietDatMon);
        chiTietDatMon.setLayoutManager(new LinearLayoutManager(this));

        monAnList = new ArrayList<>();
        adapter = new DatMonAdapter(this, monAnList);
        chiTietDatMon.setAdapter(adapter);
        getListMonAnFromDB();
        double tien = tinhTongTien();

        datNgay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (diaChi.getText().toString().isEmpty()) {
                    textInputLayout.setError("Địa chỉ giao hàng không được để trống");
                }
                else {
                    datMon(tien);
                    Intent intent = new Intent(DatMonActivity.this, MainActivity.class);
                    startActivity(intent);
                    finish();
                }
            }
        });
    }

    private double tinhTongTien() {
        double tien = 0;
        for (MonAn monAn: monAnList) {
            tien += monAn.getGia() * monAn.getSoLuongDat();
        }

        DecimalFormat formatter = new DecimalFormat("#,### đ");
        String formattedNumber = formatter.format(tien);
        tongtien.setText(formattedNumber);
        return tien;
    }

    private void getListMonAnFromDB() {
        Cursor cursor = gioHangHelper.getAll();
        while (cursor.moveToNext()) {
            int maMonAn = cursor.getInt(0);
            String tenMonAn = cursor.getString(1);

            double gia = cursor.getDouble(3);
            int soluong = cursor.getInt(4);
            String anh = cursor.getString(5);
            monAnList.add(new MonAn(maMonAn, tenMonAn, gia, anh, soluong));
        }
        adapter.notifyDataSetChanged();
    }

    private void datMon(Double tongtien) {
        SharedPreferences loginInfo = getSharedPreferences("login_information", MODE_PRIVATE);
        int maCuaHang = sharedPreferences.getInt("maCuaHang", 0);
        String sdtkh = loginInfo.getString("phoneNumber", "0123456789");
        int rbid = ptThanhToan.getCheckedRadioButtonId();
        RadioButton pttt = findViewById(rbid);
        String ptttText = pttt.getText().toString();
        insertDHOnline(sdtkh, tongtien, maCuaHang, diaChi.getText().toString(), ptttText);
    }

    private void insertDHOnline(String sdtkh, Double tongtien, int maCuaHang, String diaChi, String pttt) {
        OkHttpClient client = new OkHttpClient();
        Request request = new Request.Builder().url("http://10.0.2.2/KFC_ChainStores/donHang/insertDHOnline/" +
                sdtkh+"/"+tongtien+"/"+maCuaHang+"/"+diaChi+"/"+pttt).build();

        client.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(@NotNull Call call, @NotNull IOException e) {
                Log.d("onFailure", e.getMessage());
            }
            @Override
            public void onResponse(Call call, final Response response)
                    throws IOException {
                String responseData = response.body().string();
                try {
                    JSONObject jsonObject = new JSONObject(responseData);
                    boolean check = jsonObject.getBoolean("status");
                    Log.d("DATMONNNNNNN", "onResponse: "+check);
                    if (check) {
                        insertCTDH(maCuaHang);
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        });
    }

    private void insertCTDH(int maCuaHang) {

        OkHttpClient client = new OkHttpClient();
        Request getMaHoaDon = new Request.Builder().url("http://10.0.2.2/KFC_ChainStores/donHang/getMaDonHangMoiNhat/" +
                maCuaHang).build();
        client.newCall(getMaHoaDon).enqueue(new Callback() {
            @Override
            public void onFailure(@NonNull Call call, @NonNull IOException e) {
                Log.d("onFailure", e.getMessage());
            }

            @Override
            public void onResponse(@NonNull Call call, @NonNull Response response) throws IOException {
                try {
                    String res1 = response.body().string();
                    int maDonHang = Integer.parseInt(res1);
                    Cursor cursor = gioHangHelper.getAll();
                    while (cursor.moveToNext()) {
                        int maMonAn = cursor.getInt(0);
                        int soluong = cursor.getInt(4);
                        OkHttpClient client = new OkHttpClient();
                        Request insertCTHD = new Request.Builder().url("http://10.0.2.2/KFC_ChainStores/chiTietDonHang/insert/" +
                                maDonHang+"/"+maMonAn+"/"+soluong).build();
                        client.newCall(insertCTHD).enqueue(new Callback() {
                            @Override
                            public void onFailure(@NonNull Call call, @NonNull IOException e) {
                                Log.d("onFailure", e.getMessage());
                            }

                            @Override
                            public void onResponse(@NonNull Call call, @NonNull Response response) throws IOException {
                                Log.d("DOMUOI", "onResponse: insertCTDH");
                            }
                        });
                    }

                } catch (IOException | NumberFormatException e) {
                    e.printStackTrace();
                }
            }
        });
    }
}