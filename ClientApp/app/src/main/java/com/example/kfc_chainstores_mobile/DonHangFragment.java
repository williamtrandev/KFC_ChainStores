package com.example.kfc_chainstores_mobile;

import static android.content.Context.MODE_PRIVATE;

import android.content.SharedPreferences;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import androidx.recyclerview.widget.RecyclerView.Adapter;

import com.example.kfc_chainstores_mobile.adapters.ListCuaHangAdapter;
import com.example.kfc_chainstores_mobile.adapters.ListDonHangAdapter;
import com.example.kfc_chainstores_mobile.model.CuaHang;
import com.example.kfc_chainstores_mobile.model.DonHang;

import org.jetbrains.annotations.NotNull;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.Response;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link DonHangFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class DonHangFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public DonHangFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment DonHangFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static DonHangFragment newInstance(String param1, String param2) {
        DonHangFragment fragment = new DonHangFragment();
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


    RecyclerView rcDonHang;
    ListDonHangAdapter adapter;
    List<DonHang> donHangList;
    SharedPreferences sharedPreferences;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        getAllDonHang();
        View view = inflater.inflate(R.layout.fragment_don_hang, container, false);
        rcDonHang = view.findViewById(R.id.rc_dsdonhang);
        sharedPreferences = getActivity().getSharedPreferences("login_information", MODE_PRIVATE);
        donHangList = new ArrayList<>();
        adapter = new ListDonHangAdapter(getActivity(), donHangList);
        rcDonHang.setAdapter(adapter);
        rcDonHang.setLayoutManager(new LinearLayoutManager(getActivity()));
        return view;
    }
    public void getAllDonHang() {
        OkHttpClient client = new OkHttpClient();
        SharedPreferences sharedPreferences = getActivity().getSharedPreferences("login_information", MODE_PRIVATE);
        Request request = new Request.Builder().url("http://10.0.2.2/KFC_ChainStores/donHang/getAllDonHangTheoNVGiao/" + sharedPreferences.getInt("maNhanVien", 0)).build();

        client.newCall(request).enqueue(new Callback() {
            @Override
            public void onFailure(@NotNull Call call, @NotNull IOException e) {
                Log.d("onFailure", e.getMessage());
            }
            @Override
            public void onResponse(Call call, final Response response)
                    throws IOException {
                try {
                    String responseData = response.body().string();
                    JSONArray jsonRes = new JSONArray(responseData);
                    for (int i = 0; i < jsonRes.length(); i++) {
                        JSONObject json = jsonRes.getJSONObject(i);
                        int maDonHang = json.getInt("maDonHang");
                        String sdtKhachHang = json.getString("sdtKhachHang");
                        String ngayLap = json.getString("ngayLap");
                        int tongTien = json.getInt("tongTien");
                        String trangThai = json.getString("trangThai");
                        String phuongThucThanhToan = json.getString("phuongThucThanhToan");
                        int trangThaiThanhToan = json.getInt("trangThaiThanhToan");
                        String diaChiGiaoHang = json.getString("diaChiGiaoHang");
                        DonHang donHang = new DonHang(maDonHang, sdtKhachHang, ngayLap, tongTien, trangThai, diaChiGiaoHang, phuongThucThanhToan, trangThaiThanhToan);

                        donHangList.add(donHang);
                    }

                    requireActivity().runOnUiThread(new Runnable() {
                        @Override
                        public void run() {
                            adapter.notifyDataSetChanged();
                        }
                    });

                } catch (JSONException e) {
                    Log.d("onResponse", e.getMessage());
                }
            }
        });
    }
}