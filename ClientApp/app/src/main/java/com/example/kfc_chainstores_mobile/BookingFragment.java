package com.example.kfc_chainstores_mobile;

import android.content.Intent;
import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Adapter;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;

import com.example.kfc_chainstores_mobile.adapters.ListCuaHangAdapter;
import com.example.kfc_chainstores_mobile.model.CuaHang;

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
 * Use the {@link BookingFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class BookingFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    public BookingFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment BookingFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static BookingFragment newInstance(String param1, String param2) {
        BookingFragment fragment = new BookingFragment();
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

    ListView lvCuaHang;
    ListCuaHangAdapter adapter;
    List<CuaHang> cuaHangList;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_booking, container, false);
        lvCuaHang = view.findViewById(R.id.lv_cuaHang);

        cuaHangList = new ArrayList<>();
        adapter = new ListCuaHangAdapter(getActivity(), cuaHangList);
        lvCuaHang.setAdapter(adapter);
        getCuaHang();

        lvCuaHang.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> adapterView, View view, int i, long l) {
//                ListMonAnFragment listMonAnFragment = new ListMonAnFragment();
//                getActivity().getSupportFragmentManager().beginTransaction().replace(R.id.container, listMonAnFragment).commit();
                Intent intent = new Intent(getActivity(), ListMonAnActivity.class);
                startActivity(intent);
            }
        });

        return view;
    }

    public void getCuaHang() {
        OkHttpClient client = new OkHttpClient();
        Request request = new Request.Builder().url("http://10.0.2.2/KFC_ChainStores/cuaHang/getAll").build();

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
                        String maCuaHang = json.getString("maCuaHang");
                        String tenCuaHang = json.getString("tenCuaHang");
                        String chiNhanh = json.getString("chiNhanh");
                        CuaHang cuaHang = new CuaHang(maCuaHang, tenCuaHang, chiNhanh);

                        cuaHangList.add(cuaHang);
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