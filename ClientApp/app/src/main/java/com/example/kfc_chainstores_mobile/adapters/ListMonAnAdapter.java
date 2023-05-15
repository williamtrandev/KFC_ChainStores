package com.example.kfc_chainstores_mobile.adapters;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.AsyncTask;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.cardview.widget.CardView;
import androidx.recyclerview.widget.RecyclerView;

import com.example.kfc_chainstores_mobile.R;
import com.example.kfc_chainstores_mobile.model.MonAn;
import com.squareup.picasso.Picasso;

import java.io.IOException;
import java.net.URL;
import java.text.DecimalFormat;
import java.util.List;

public class ListMonAnAdapter extends RecyclerView.Adapter<ListMonAnAdapter.MonAnViewHolder> {

    private Context context;
    private List<MonAn> monAnList;
    private MonAnClickListener monAnClickListener;

    public ListMonAnAdapter(Context context, List<MonAn> monAnList, MonAnClickListener monAnClickListener) {
        this.context = context;
        this.monAnList = monAnList;
        this.monAnClickListener = monAnClickListener;
    }

    @NonNull
    @Override
    public MonAnViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.mon_an_item, parent, false);
        return new MonAnViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull MonAnViewHolder holder, int position) {

        MonAn monAn = monAnList.get(position);
        if (monAn == null) {
            return;
        }

        String imageUrl = "http://10.0.2.2:8080/KFC_ChainStores/public/assets/client/img/"+monAn.getImage_path();
        Picasso.get().load(imageUrl).into(holder.imageView);

        holder.tv_tenMonAn.setText(monAn.getTenMonAn());

        double number = monAn.getGia();
        DecimalFormat formatter = new DecimalFormat("#,### đ");
        String formattedNumber = formatter.format(number);
        holder.tv_gia.setText(formattedNumber);

        holder.tv_mota.setText(monAn.getMota());

        holder.cardView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                monAnClickListener.onMonAnClick(monAn);
            }
        });
    }

    @Override
    public int getItemCount() {
        return monAnList.size();
    }

    public void setData(List<MonAn> monAnList) {
        this.monAnList = monAnList;
        notifyDataSetChanged();
    }

    public static class MonAnViewHolder extends RecyclerView.ViewHolder {
        CardView cardView;
        ImageView imageView;
        TextView tv_tenMonAn, tv_gia, tv_mota;
        public MonAnViewHolder(@NonNull View itemView) {
            super(itemView);
            cardView = itemView.findViewById(R.id.cv_monAn);
            imageView = itemView.findViewById(R.id.imageView);
            tv_tenMonAn = itemView.findViewById(R.id.tv_tenMonAn);
            tv_gia = itemView.findViewById(R.id.tv_gia);
            tv_mota = itemView.findViewById(R.id.tv_mota);
        }
    }

    public interface MonAnClickListener {
        void onMonAnClick(MonAn monAn);
    }
}
