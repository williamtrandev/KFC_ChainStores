package com.example.kfc_chainstores_mobile.model;

import android.util.Log;

import org.jetbrains.annotations.NotNull;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.List;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class CuaHang {
    private String maCuaHang;
    private String tenCuaHang;
    private String chiNhanh;

    public CuaHang(String maCuaHang, String tenCuaHang, String chiNhanh) {
        this.maCuaHang = maCuaHang;
        this.tenCuaHang = tenCuaHang;
        this.chiNhanh = chiNhanh;
    }

    public List<CuaHang> getCuaHang() {
        OkHttpClient client = new OkHttpClient();

        Request request = new Request.Builder().url("http://10.0.2.2/api/get-loaiphong.php").build();

        client.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(@NotNull Call call, @NotNull IOException e) {
                Log.d("onFailure", e.getMessage());
            }
            @Override
            public void onResponse(Call call, final Response response)
                    throws IOException {
                try {
                    String responseData = response.body().string();
                    JSONObject json = new JSONObject(responseData);
                    boolean status = json.getBoolean("status");
                    if (status) {
                        JSONArray data = json.getJSONArray("data");
                        for (int i = 0; i < data.length(); i++) {
                            JSONObject jsonObject = data.getJSONObject(i);
                            String maloaiphong = jsonObject.getString("maloaiphong");
                            String tenloaiphong = jsonObject.getString("tenloaiphong");
                            String anh = jsonObject.getString("anh");
                            String mota = jsonObject.getString("mota");
                            double danhgia = jsonObject.getInt("danhgia");
                            int songuoidanhgia = 0;
                            double gia = (float) jsonObject.getDouble("gia");

                            LoaiPhong loaiPhong = new LoaiPhong(maloaiphong, tenloaiphong, anh, mota, danhgia, songuoidanhgia, gia);
                            loaiPhongList.add(loaiPhong);
                        }
                    }

                    requireActivity().runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            adapter.notifyDataSetChanged();
                        }
                    });
                } catch (JSONException e) {
                    Log.d("onResponse", e.getMessage());
                }
            }
        });
    }
}
