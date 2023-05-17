package com.example.kfc_chainstores_mobile.model;

public class DonHang {
    private int maDonHang;
    private String sdtKhachHang, phuongThucThanhToan;
    private String ngayLap;
    private int tongTien;
    private String trangThai;
    private int trangThaiThanhToan;
    private String diaChiGiaoHang;
    public DonHang(int maDonHang, String sdtKhachHang, String ngayLap, int tongTien, String trangThai, String diaChiGiaoHang, String phuongThucThanhToan, int trangThaiThanhToan) {
        this.maDonHang = maDonHang;
        this.sdtKhachHang = sdtKhachHang;
        this.ngayLap = ngayLap;
        this.tongTien = tongTien;
        this.trangThai = trangThai;
        this.diaChiGiaoHang = diaChiGiaoHang;
        this.phuongThucThanhToan = phuongThucThanhToan;
        this.trangThaiThanhToan = trangThaiThanhToan;
    }


    public int getMaDonHang() {
        return maDonHang;
    }
    public String getSdtKhachHang() {
        return sdtKhachHang;
    }
    public String getNgayLap() {
        return ngayLap;
    }
    public int getTongTien() {
        return tongTien;
    }
    public String getTrangThai() {
        return trangThai;
    }
    public String getPhuongThucThanhToan() {return phuongThucThanhToan;}
    public String getDiaChiGiaoHang() {
        return diaChiGiaoHang;
    }
}
