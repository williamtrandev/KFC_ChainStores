package com.example.kfc_chainstores_mobile;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.MenuItem;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class MainActivityNhanVien extends AppCompatActivity {
    BottomNavigationView bottomNavigationView;
    DonHangFragment donHangFragment = new DonHangFragment();
    AccountFragment accountFragment = new AccountFragment();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_nhan_vien);


        bottomNavigationView = findViewById(R.id.bottomNavigationView);
        getSupportFragmentManager().beginTransaction().replace(R.id.container_nhanvien, donHangFragment).commit();

        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.nav_donhang:
                        getSupportFragmentManager().beginTransaction().replace(R.id.container_nhanvien, donHangFragment).commit();
                        return true;
                    case R.id.nav_account_nhanvien:
                        getSupportFragmentManager().beginTransaction().replace(R.id.container_nhanvien, accountFragment).commit();
                        return true;
                }
                return false;
            }
        });
    }
}