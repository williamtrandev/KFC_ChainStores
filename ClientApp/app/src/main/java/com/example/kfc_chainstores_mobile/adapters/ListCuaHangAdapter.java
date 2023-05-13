package com.example.kfc_chainstores_mobile.adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.BaseAdapter;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.example.kfc_chainstores_mobile.R;
import com.example.kfc_chainstores_mobile.model.CuaHang;

import java.util.List;

public class ListCuaHangAdapter extends BaseAdapter {

//    TextView tv_tenCuaHang, tv_chiNhanh;
    List<CuaHang> cuaHangList;
    LayoutInflater layoutInflater;

    public ListCuaHangAdapter(Context context, List<CuaHang> list) {
        this.layoutInflater = LayoutInflater.from(context);
        this.cuaHangList = list;
    }

    @Override
    public int getCount() {
        return cuaHangList.size();
    }

    @Override
    public Object getItem(int i) {
        return cuaHangList.get(i);
    }

    @Override
    public long getItemId(int i) {
        return i;
    }

    @Override
    public View getView(int i, View view, ViewGroup viewGroup) {
        ViewHolder holder;
        if (view == null) {
            view = layoutInflater.inflate(R.layout.list_cuahang_item, null);
            holder = new ViewHolder();
            holder.tv_tenCuaHang = view.findViewById(R.id.tv_tenCuaHang);
            holder.tv_chiNhanh = view.findViewById(R.id.tv_chiNhanh);
            view.setTag(holder);
        } else {
            holder = (ViewHolder) view.getTag();
        }

        holder.tv_tenCuaHang.setText(cuaHangList.get(i).getTenCuaHang());
        holder.tv_chiNhanh.setText(cuaHangList.get(i).getChiNhanh());

        return view;
    }

    static class ViewHolder {
        TextView tv_tenCuaHang, tv_chiNhanh;
    }
}
