package com.example.kfc_chainstores_mobile;

import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Paint;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import com.google.android.material.textfield.TextInputEditText;

public class LoginActivity extends AppCompatActivity {

    TextInputEditText sdt, pass;
    TextView passForgot, register;
    Button login;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        sdt = findViewById(R.id.edtxt_sdt);
        pass = findViewById(R.id.edtxt_pass);
        passForgot = findViewById(R.id.tv_passForgot);
        register = findViewById(R.id.tv_register);
        login = findViewById(R.id.btn_login);

        passForgot.setPaintFlags(passForgot.getPaintFlags() |   Paint.UNDERLINE_TEXT_FLAG);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if (sdt.getText().toString().isEmpty() || pass.getText().toString().isEmpty()) {
                    if (sdt.getText().toString().isEmpty()) {
                        sdt.setError("Không được để trống");
                    }
                    if (pass.getText().toString().isEmpty()) {
                        pass.setError("Không được để trống");
                    }
                }
                else {

                }
            }
        });
    }
}