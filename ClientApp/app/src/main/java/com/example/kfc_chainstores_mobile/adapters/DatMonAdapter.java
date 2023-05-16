package com.example.kfc_chainstores_mobile.adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.kfc_chainstores_mobile.R;
import com.example.kfc_chainstores_mobile.model.MonAn;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.util.List;

public class DatMonAdapter extends RecyclerView.Adapter<DatMonAdapter.DatMonViewHolder> {

    private Context context;
    private List<MonAn> monAnList;

    public DatMonAdapter(Context context, List<MonAn> monAnList) {
        this.context = context;
        this.monAnList = monAnList;
    }

    @NonNull
    @Override
    public DatMonViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.datmon_item, parent, false);
        return new DatMonViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull DatMonViewHolder holder, int position) {
        MonAn monAn = monAnList.get(position);
        if (monAn == null) {
            return;
        }

        String imageUrl = "http://10.0.2.2/KFC_ChainStores/public/assets/client/img/"+monAn.getImage_path();
        Picasso.get().load(imageUrl).into(holder.anh);

        holder.tenMonAn.setText(monAn.getTenMonAn());

        double number = monAn.getGia();
        DecimalFormat formatter = new DecimalFormat("#,### đ");
        String formattedNumber = formatter.format(number);
        holder.gia.setText(formattedNumber);

        holder.soluong.setText("Số lượng đặt: "+monAn.getSoLuongDat());
    }

    @Override
    public int getItemCount() {
        return monAnList.size();
    }

    public static class DatMonViewHolder extends RecyclerView.ViewHolder {
        TextView tenMonAn, gia, soluong;
        ImageView anh;
        public DatMonViewHolder(@NonNull View itemView) {
            super(itemView);
            anh = itemView.findViewById(R.id.iv_monAn_dm);
            tenMonAn = itemView.findViewById(R.id.tv_tenMonAn_dm);
            gia = itemView.findViewById(R.id.tv_gia_dm);
            soluong = itemView.findViewById(R.id.tv_soluong_dm);
        }
    }
}
