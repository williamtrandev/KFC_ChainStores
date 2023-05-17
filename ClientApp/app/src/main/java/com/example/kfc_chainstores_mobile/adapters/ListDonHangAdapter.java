package com.example.kfc_chainstores_mobile.adapters;



import static android.content.Context.MODE_PRIVATE;

import android.content.Context;
import android.content.SharedPreferences;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.kfc_chainstores_mobile.R;
import com.example.kfc_chainstores_mobile.model.DonHang;

import org.jetbrains.annotations.NotNull;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.text.DecimalFormat;
import java.util.List;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class ListDonHangAdapter extends RecyclerView.Adapter<ListDonHangAdapter.DonHangViewHolder> {

    List<DonHang> donHangList;
    LayoutInflater layoutInflater;
    int madonhang = 0;
    private ListDonHangAdapter.DonHangClickListener donHangClickListener;
    public ListDonHangAdapter(Context context, List<DonHang> list) {
        this.layoutInflater = LayoutInflater.from(context);
        this.donHangList = list;
    }

    @NonNull
    @Override
    public DonHangViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.donhang_item, parent, false);
        return new ListDonHangAdapter.DonHangViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull DonHangViewHolder holder, int position) {
        DonHang donHang = donHangList.get(position);

        //holder.tv_madh.setText(donHang.getMaDonHang());

        holder.tv_madh.setText("Mã đơn hàng: " + String.valueOf(donHang.getMaDonHang()));
        holder.tv_sdt.setText(donHang.getSdtKhachHang());
        holder.tv_pttt.setText(donHang.getPhuongThucThanhToan());
        holder.tv_diachi.setText(donHang.getDiaChiGiaoHang());
        DecimalFormat formatter = new DecimalFormat("#,### đ");
        String formattedNumber = formatter.format(donHang.getTongTien());
        holder.tv_tongtien.setText(formattedNumber);
        holder.btn_hoanthanhdon.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                madonhang = donHang.getMaDonHang();
                Request request = new Request.Builder().url("http://10.0.2.2:8080/KFC_ChainStores/donHang/updateTrangThaiDonHangMobile/"+donHang.getMaDonHang()+"/Hoàn thành").build();
                OkHttpClient client = new OkHttpClient();
                client.newCall(request).enqueue(new Callback() {
                    @Override
                    public void onFailure(@NotNull Call call, @NotNull IOException e) {
                        Log.d("onFailure", e.getMessage());
                    }
                    @Override
                    public void onResponse(@NonNull Call call, @NonNull final Response response)
                            throws IOException {
                        try {
                            String responseData = response.body().string();
                            JSONObject jsonRes = new JSONObject(responseData);
                            boolean status = jsonRes.getBoolean("status");
                            if (status) {
                                int position = holder.getAdapterPosition();
                                donHangList.remove(position);
                                notifyDataSetChanged();
                            }
                            else {

                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                });
                Request subrequest = new Request.Builder().url("http://10.0.2.2:8080/KFC_ChainStores/thanhToan/update/" + madonhang + "/1").build();

                client.newCall(subrequest).enqueue(new Callback() {
                    @Override
                    public void onFailure(@NotNull Call call, @NotNull IOException e) {
                        Log.d("onFailure", e.getMessage());
                    }
                    @Override
                    public void onResponse(@NonNull Call call, @NonNull final Response response)
                            throws IOException {
                        try {
                            String responseData = response.body().string();
                            JSONObject jsonRes = new JSONObject(responseData);
                            boolean status = jsonRes.getBoolean("status");
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                });
            }
        });
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    @Override
    public int getItemCount() {
        return donHangList.size();
    }

    public static class DonHangViewHolder extends RecyclerView.ViewHolder {

        TextView tv_madh, tv_sdt, tv_pttt, tv_diachi, tv_tongtien;
        Button btn_hoanthanhdon;
        public DonHangViewHolder(@NonNull View itemView) {
            super(itemView);
            btn_hoanthanhdon = itemView.findViewById(R.id.button_hoanthanhdon);
            tv_madh = itemView.findViewById(R.id.tv_maDH);
            tv_sdt = itemView.findViewById(R.id.tv_sdt);
            tv_pttt = itemView.findViewById(R.id.tv_pttt);
            tv_diachi = itemView.findViewById(R.id.tv_diachi);
            tv_tongtien = itemView.findViewById(R.id.tv_tongtienDH);
        }


    }
    public interface DonHangClickListener {
        void onDonHangClick(DonHang donHang);
    }
}
