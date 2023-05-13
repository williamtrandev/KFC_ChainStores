package com.example.kfc_chainstores_mobile.model;

public class MonAn {
    private int maMonAn;
    private String tenMonAn;
    private String mota;
    private double gia;
    private String image_path;
    private int id_loaiMon;

    public MonAn(int maMonAn, String tenMonAn, String mota, double gia, String image_path, int id_loaiMon) {
        this.maMonAn = maMonAn;
        this.tenMonAn = tenMonAn;
        this.mota = mota;
        this.gia = gia;
        this.image_path = image_path;
        this.id_loaiMon = id_loaiMon;
    }

    public int getMaMonAn() {
        return maMonAn;
    }

    public String getTenMonAn() {
        return tenMonAn;
    }

    public String getMota() {
        return mota;
    }

    public double getGia() {
        return gia;
    }

    public String getImage_path() {
        return image_path;
    }

    public int getId_loaiMon() {
        return id_loaiMon;
    }
}
