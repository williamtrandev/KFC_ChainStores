package com.example.kfc_chainstores_mobile.model;

public class LoaiMon {
    private int id_loaimon;
    private String tenLoaiMon;

    public LoaiMon(int id_loaimon, String tenLoaiMon) {
        this.id_loaimon = id_loaimon;
        this.tenLoaiMon = tenLoaiMon;
    }

    public int getId_loaimon() {
        return id_loaimon;
    }

    public String getTenLoaiMon() {
        return tenLoaiMon;
    }
}
