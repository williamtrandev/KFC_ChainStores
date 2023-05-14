package com.example.kfc_chainstores_mobile;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class MainActivity extends AppCompatActivity {

    BottomNavigationView bottomNavigationView;

    BookingFragment bookingFragment = new BookingFragment();
    AccountFragment accountFragment = new AccountFragment();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        bottomNavigationView = findViewById(R.id.bottomNavigationView);
        getSupportFragmentManager().beginTransaction().replace(R.id.container, bookingFragment).commit();

        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()) {
                    case R.id.nav_booking:
                        getSupportFragmentManager().beginTransaction().replace(R.id.container, bookingFragment).commit();
                        return true;
                    case R.id.nav_account:
                        getSupportFragmentManager().beginTransaction().replace(R.id.container, accountFragment).commit();
                        return true;
                }
                return false;
            }
        });
    }
}