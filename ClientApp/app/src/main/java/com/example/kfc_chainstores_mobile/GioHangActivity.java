package com.example.kfc_chainstores_mobile;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.content.SharedPreferences;
import android.database.Cursor;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.example.kfc_chainstores_mobile.adapters.ChiTietGioHangAdapter;
import com.example.kfc_chainstores_mobile.database.GioHangHelper;
import com.example.kfc_chainstores_mobile.model.MonAn;

import java.text.DecimalFormat;
import java.util.ArrayList;
import java.util.List;

public class GioHangActivity extends AppCompatActivity {

    TextView tenCuaHang, chiNhanh, tongtien;
    Button datNgay;

    RecyclerView chiTietGioHang;
    ChiTietGioHangAdapter adapter;
    List<MonAn> monAnList;

    GioHangHelper gioHangHelper;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_gio_hang);

        getSupportActionBar().setTitle("Giỏ hàng");

        gioHangHelper = new GioHangHelper(this, null);

        tenCuaHang = findViewById(R.id.tv_tenCuaHang_dh);
        chiNhanh = findViewById(R.id.tv_chiNhanh_dh);
        tongtien = findViewById(R.id.tv_tongtien_gh);
        datNgay = findViewById(R.id.btn_datMon_gh);
        chiTietGioHang = findViewById(R.id.rcv_chiTietGioHang);
        chiTietGioHang.setLayoutManager(new LinearLayoutManager(this));

        SharedPreferences sharedPreferences = getSharedPreferences("donhang", MODE_PRIVATE);
        tenCuaHang.setText(sharedPreferences.getString("tenCuaHang", "KFC"));
        chiNhanh.setText(sharedPreferences.getString("chiNhanh", "Quận 0"));

        monAnList = new ArrayList<>();

        adapter = new ChiTietGioHangAdapter(this, monAnList, new ChiTietGioHangAdapter.OnDataChangeListener() {
            @Override
            public void onDataChanged(double tien) {
                DecimalFormat formatter = new DecimalFormat("#,### đ");
                String formattedNumber = formatter.format(tien);
                tongtien.setText(formattedNumber);
            }
        });
        chiTietGioHang.setAdapter(adapter);
        getGioHangFromDB();

        double tien = 0;
        for (MonAn monAn: monAnList) {
            tien += monAn.getGia() * monAn.getSoLuongDat();
        }

        DecimalFormat formatter = new DecimalFormat("#,### đ");
        String formattedNumber = formatter.format(tien);
        tongtien.setText(formattedNumber);

        datNgay.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                datHangOnline();
            }
        });
    }

    @Override
    protected void onDestroy() {
        super.onDestroy();
        gioHangHelper.close();
    }

    @SuppressLint("NotifyDataSetChanged")
    private void getGioHangFromDB() {
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

    public void datHangOnline() {
        Intent intent = new Intent(this, DatMonActivity.class);
        startActivity(intent);
    }
}