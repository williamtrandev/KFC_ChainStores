package com.example.kfc_chainstores_mobile.model;

import android.util.Log;

import org.jetbrains.annotations.NotNull;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class CuaHang {
    private int maCuaHang;
    private String tenCuaHang;
    private String chiNhanh;

    public CuaHang() {}

    public CuaHang(int maCuaHang, String tenCuaHang, String chiNhanh) {
        this.maCuaHang = maCuaHang;
        this.tenCuaHang = tenCuaHang;
        this.chiNhanh = chiNhanh;
    }

    public int getMaCuaHang() {
        return maCuaHang;
    }

    public String getTenCuaHang() {
        return tenCuaHang;
    }

    public String getChiNhanh() {
        return chiNhanh;
    }
}
