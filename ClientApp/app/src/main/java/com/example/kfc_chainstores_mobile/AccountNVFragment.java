package com.example.kfc_chainstores_mobile;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link AccountNVFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class AccountNVFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public AccountNVFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment fragment_account_nv.
     */
    // TODO: Rename and change types and number of parameters
    public static AccountNVFragment newInstance(String param1, String param2) {
        AccountNVFragment fragment = new AccountNVFragment();
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

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_account_nv, container, false);

        SharedPreferences sharedPreferences = requireActivity().getSharedPreferences("login_information", Context.MODE_PRIVATE);

        TextView ten = view.findViewById(R.id.tv_tennv);
        TextView sdt = view.findViewById(R.id.tv_sdtNhanVien);
        TextView gioitinh = view.findViewById(R.id.tv_gioitinh);
        TextView ngaysinh = view.findViewById(R.id.tv_ngaysinh);
        TextView diachi = view.findViewById(R.id.tv_diachi);
        int numgt = Integer.parseInt(sharedPreferences.getString("gioitinh", "1"));
        String gtString = numgt == 1? "Nam":"Nữ";
        ten.setText("Họ tên: " + sharedPreferences.getString("name", "William Tran"));
        sdt.setText("Số điện thoại: " + sharedPreferences.getString("phoneNumber", "09219398312"));
        gioitinh.setText("Giới tính: " + gtString);
        ngaysinh.setText("Ngày sinh: " + sharedPreferences.getString("ngaysinh", "30-11-2003"));
        diachi.setText("Địa chỉ: " + sharedPreferences.getString("diachi", "Việt Nam"));
        return view;
    }
}