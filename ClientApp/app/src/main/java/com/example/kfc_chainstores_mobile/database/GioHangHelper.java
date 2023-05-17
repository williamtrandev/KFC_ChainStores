package com.example.kfc_chainstores_mobile.database;

import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.util.Log;

import androidx.annotation.Nullable;

import com.example.kfc_chainstores_mobile.model.MonAn;

public class GioHangHelper extends SQLiteOpenHelper {

    private static final String DATABASE_NAME = "db_giohang.db";
    private static final int DATABASE_VERSION = 1;
    private static final String TABLE_NAME = "GioHang";

    public static final String KEY_maMonAn = "maMonAn";
    public static final String KEY_tenMonAn = "tenMonAn";
    public static final String KEY_mota = "mota";
    public static final String KEY_gia = "gia";
    public static final String KEY_soluong = "soluong";
    public static final String KEY_anh = "anh";

    private static final String[] COLUMNS = {KEY_maMonAn, KEY_tenMonAn, KEY_mota, KEY_gia, KEY_soluong, KEY_anh};

    public GioHangHelper(@Nullable Context context, @Nullable SQLiteDatabase.CursorFactory factory) {
        super(context, DATABASE_NAME, factory, DATABASE_VERSION);
    }

    @Override
    public void onCreate(SQLiteDatabase sqLiteDatabase) {
        String createTable = "CREATE TABLE IF NOT EXISTS GioHang (maMonAn INT PRIMARY KEY, tenMonAn VARCHAR(100), mota VARCHAR(255), gia DOUBLE, soluong INT, anh VARCHAR(255))";
        Log.d("TẠO BẢNG ĐCM NÓ", "onCreate: ");
        sqLiteDatabase.execSQL(createTable);
    }

    @Override
    public void onUpgrade(SQLiteDatabase sqLiteDatabase, int i, int i1) {
        sqLiteDatabase.execSQL("DROP TABLE IF EXISTS " + TABLE_NAME);
        onCreate(sqLiteDatabase);
    }

    public Cursor selectSoLuong(MonAn monAn) {
        SQLiteDatabase db = getReadableDatabase();
        String find = "SELECT COUNT(*) FROM GioHang WHERE maMonAn = ?";
        Cursor cursor = db.rawQuery(find, new String[]{String.valueOf(monAn.getMaMonAn())});
        return cursor;
    }

    public void insertGioHang(MonAn monAn, String soluong) {
        SQLiteDatabase db = getWritableDatabase();
        String qr = "INSERT INTO GioHang values(?,?,?,?,?,?)";
        String[] args = new String[]{
                String.valueOf(monAn.getMaMonAn()),
                monAn.getTenMonAn(),
                monAn.getMota(),
                String.valueOf(monAn.getGia()),
                soluong,
                monAn.getImage_path()
        };
        db.execSQL(qr, args);
    }

    public void updateSoLuong(MonAn monAn, String soluong) {
        SQLiteDatabase db = getWritableDatabase();
        String qr = "UPDATE GioHang SET soluong = ?";
        db.execSQL(qr, new String[]{soluong});
    }

    public Cursor getAll() {
        SQLiteDatabase db = getReadableDatabase();
        String qr = "SELECT * FROM GioHang";
        return db.rawQuery(qr, null);
    }

    public void setSoluong(MonAn monAn) {
        SQLiteDatabase db = getWritableDatabase();
        String qr = "UPDATE GioHang SET soluong = ? WHERE maMonAn = ?";
        db.execSQL(qr, new String[]{String.valueOf(monAn.getSoLuongDat()), String.valueOf(monAn.getMaMonAn())});
    }

    public void delete(MonAn monAn) {
        SQLiteDatabase db = getWritableDatabase();
        String qr = "DELETE FROM GioHang WHERE maMonAn = ?";
        db.execSQL(qr, new String[]{String.valueOf(monAn.getMaMonAn())});
    }

    public void clear() {
        SQLiteDatabase db = getWritableDatabase();
        String qr = "DELETE FROM GioHang";
        db.execSQL(qr);
    }
}
