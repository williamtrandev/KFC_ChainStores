package com.example.kfc_chainstores_mobile;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.graphics.Paint;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.kfc_chainstores_mobile.model.LoaiMon;
import com.google.android.material.tabs.TabLayout;
import com.google.android.material.textfield.TextInputEditText;
import com.google.android.material.textfield.TextInputLayout;

import org.jetbrains.annotations.NotNull;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

public class LoginActivity extends AppCompatActivity {

    TextInputLayout layout_sdt, layout_pass;
    TextInputEditText sdt, pass;
    TextView passForgot, register;
    Button login;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        layout_sdt = findViewById(R.id.layout_sdt);
        layout_pass = findViewById(R.id.layout_pass);
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
                        layout_sdt.setError("Không được để trống");
                    }
                    if (pass.getText().toString().isEmpty()) {
                        layout_pass.setError("Không được để trống");
                    }
                }
                else {
                    clientLogin(sdt.getText().toString(), pass.getText().toString());
                }
            }
        });

        sdt.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {

            }

            @Override
            public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {
                layout_sdt.setError(null);
            }

            @Override
            public void afterTextChanged(Editable editable) {

            }
        });

        pass.addTextChangedListener(new TextWatcher() {
            @Override
            public void beforeTextChanged(CharSequence charSequence, int i, int i1, int i2) {

            }

            @Override
            public void onTextChanged(CharSequence charSequence, int i, int i1, int i2) {
                layout_pass.setError(null);
            }

            @Override
            public void afterTextChanged(Editable editable) {

            }
        });
    }

    private void clientLogin(String sdt, String pass) {
        OkHttpClient client = new OkHttpClient();
        Request request = new Request.Builder().url("http://10.0.2.2/KFC_ChainStores/khachHang/authenticate/"+sdt+"/"+pass).build();

        client.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(@NotNull Call call, @NotNull IOException e) {
                Log.d("onFailure", e.getMessage());
            }
            @Override
            public void onResponse(@NonNull Call call, @NonNull final Response response)
                    throws IOException {
                String responseData = response.body().string();
                Boolean jsonRes = Boolean.valueOf(responseData);
                if (jsonRes) {

                }
                else {
                    
                }
            }
        });
    }
}