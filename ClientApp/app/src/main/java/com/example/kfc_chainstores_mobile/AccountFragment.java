package com.example.kfc_chainstores_mobile;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link AccountFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class AccountFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public AccountFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment AccountFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static AccountFragment newInstance(String param1, String param2) {
        AccountFragment fragment = new AccountFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    TextView ten, sdt, email, diem;
    Button logout;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_account, container, false);

        SharedPreferences sharedPreferences = requireActivity().getSharedPreferences("login_information", Context.MODE_PRIVATE);

        ten = view.findViewById(R.id.tv_tenKhachHang);
        sdt = view.findViewById(R.id.tv_sdt_tk);
        email = view.findViewById(R.id.tv_email);
        diem = view.findViewById(R.id.tv_diem);
        logout = view.findViewById(R.id.btn_logout);

        ten.setText(sharedPreferences.getString("name", "Luan"));
        sdt.setText(sharedPreferences.getString("phoneNumber", "0123456789"));
        email.setText(sharedPreferences.getString("email", "email@gamil.com"));
        diem.setText(String.format("Điểm: %s", sharedPreferences.getFloat("points", 0)));

        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                sharedPreferences.edit().clear().apply();
                Intent intent = new Intent(getActivity(), LoginActivity.class);
                startActivity(intent);
                getActivity().finish();
            }
        });

        return view;
    }
}