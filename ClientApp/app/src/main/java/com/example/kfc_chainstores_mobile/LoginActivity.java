package com.example.kfc_chainstores_mobile;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.content.SharedPreferences;
import android.graphics.Paint;
import android.os.Bundle;
import android.text.Editable;
import android.text.TextWatcher;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.CheckBox;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;

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
    TextView passForgot, register, error;
    CheckBox remember;
    Button login;
    RadioGroup groupChoose;
    SharedPreferences sharedPreferences;
    boolean isKhachHangLastLogin = false;
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
        error = findViewById(R.id.tv_error);
        remember = findViewById(R.id.cb_remember);
        login = findViewById(R.id.btn_login);
        groupChoose = findViewById(R.id.rg_account);
        sharedPreferences = getSharedPreferences("login_information", MODE_PRIVATE);
        if (sharedPreferences.contains("remember") && sharedPreferences.getBoolean("remember", false)) {
            goToMainActivity(isKhachHangLastLogin);
        }

        passForgot.setPaintFlags(passForgot.getPaintFlags() |   Paint.UNDERLINE_TEXT_FLAG);
        error.setVisibility(View.INVISIBLE);

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
                error.setVisibility(View.INVISIBLE);
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
                error.setVisibility(View.INVISIBLE);
            }

            @Override
            public void afterTextChanged(Editable editable) {

            }
        });
    }

    private void clientLogin(String sdt, String pass) {
        OkHttpClient client = new OkHttpClient();
        int checkedId = groupChoose.getCheckedRadioButtonId();
        if (checkedId != -1)
        {

            int radioButtonID = groupChoose.getCheckedRadioButtonId();
            View radioButton = groupChoose.findViewById(radioButtonID);
            int idx = groupChoose.indexOfChild(radioButton);
            if(idx == 0) {
                Request request = new Request.Builder().url("http://10.0.2.2:8080/KFC_ChainStores/khachHang/authenticate/"+sdt+"/"+pass).build();

                client.newCall(request).enqueue(new Callback() {
                    @Override
                    public void onFailure(@NotNull Call call, @NotNull IOException e) {
                        Log.d("onFailure", e.getMessage());
                    }
                    @Override
                    public void onResponse(@NonNull Call call, @NonNull final Response response)
                            throws IOException {
                        try {
                            String responseData = response.body().string();
                            JSONObject jsonRes = new JSONObject(responseData);
                            boolean status = jsonRes.getBoolean("status");
                            JSONObject data = jsonRes.getJSONObject("data");
                            if (status) {
                                sharedPreferences = getSharedPreferences("login_information", MODE_PRIVATE);
                                SharedPreferences.Editor editor = sharedPreferences.edit();
                                if (remember.isChecked()) {
                                    editor.putBoolean("remember", true);
                                }
                                editor.putString("phoneNumber", sdt);
                                editor.putString("password", pass);
                                editor.putString("name", data.getString("tenKhachHang"));
                                editor.putString("email", data.getString("email"));
                                editor.putString("address", data.getString("diaChi"));
                                editor.putFloat("points", (float) data.getDouble("diem"));
                                editor.apply();
                                goToMainActivity(true);
                                isKhachHangLastLogin = true;

                            }
                            else {
                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {
                                        error.setVisibility(View.VISIBLE);
                                    }
                                });
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                });
            } else {
                Request request = new Request.Builder().url("http://10.0.2.2:8080/KFC_ChainStores/nhanVien/authenticateMobile/"+sdt+"/"+pass).build();

                client.newCall(request).enqueue(new Callback() {
                    @Override
                    public void onFailure(@NotNull Call call, @NotNull IOException e) {
                        Log.d("onFailure", e.getMessage());
                    }
                    @Override
                    public void onResponse(@NonNull Call call, @NonNull final Response response)
                            throws IOException {
                        try {
                            String responseData = response.body().string();
                            JSONObject jsonRes = new JSONObject(responseData);
                            boolean status = jsonRes.getBoolean("status");
                            JSONObject data = jsonRes.getJSONObject("data");
                            if (status) {
                                sharedPreferences = getSharedPreferences("login_information", MODE_PRIVATE);
                                SharedPreferences.Editor editor = sharedPreferences.edit();
                                if (remember.isChecked()) {
                                    editor.putBoolean("remember", true);
                                }
                                editor.putString("phoneNumber", sdt);
                                editor.putString("name", data.getString("tenNhanVien"));
                                editor.putString("gioitinh", data.getString("gioiTinh"));
                                editor.putString("ngaysinh", data.getString("ngaySinh"));
                                editor.putString("diachi", data.getString("diaChi"));
                                editor.apply();
                                goToMainActivity(false);
                                isKhachHangLastLogin = false;

                            }
                            else {
                                runOnUiThread(new Runnable() {
                                    @Override
                                    public void run() {
                                        error.setVisibility(View.VISIBLE);
                                    }
                                });
                            }
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                });
            }
        }


    }

    public void goToMainActivity(boolean isKhachhang) {
        if(isKhachhang) {
            Intent intent = new Intent(LoginActivity.this, MainActivity.class);
            startActivity(intent);
        } else {
            Intent intent = new Intent(LoginActivity.this, MainActivityNhanVien.class);
            startActivity(intent);
        }
    }
}