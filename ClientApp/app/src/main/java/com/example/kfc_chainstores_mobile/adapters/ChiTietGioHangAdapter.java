package com.example.kfc_chainstores_mobile.adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.example.kfc_chainstores_mobile.R;
import com.example.kfc_chainstores_mobile.database.GioHangHelper;
import com.example.kfc_chainstores_mobile.model.MonAn;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;
import java.util.List;

public class ChiTietGioHangAdapter extends RecyclerView.Adapter<ChiTietGioHangAdapter.GioHangViewHolder> {
    private Context context;
    private List<MonAn> monAnList;
    private OnDataChangeListener listener;

    public interface OnDataChangeListener {
        void onDataChanged(double tien);
    }

    public ChiTietGioHangAdapter(Context context, List<MonAn> monAnList, OnDataChangeListener listener) {
        this.context = context;
        this.monAnList = monAnList;
        this.listener = listener;
    }

    @NonNull
    @Override
    public GioHangViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View view = LayoutInflater.from(parent.getContext()).inflate(R.layout.giohang_item, parent, false);
        return new GioHangViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull GioHangViewHolder holder, int position) {
        MonAn monAn = monAnList.get(position);
        if (monAn == null) {
            return;
        }

        String imageUrl = "http://10.0.2.2:8080/KFC_ChainStores/public/assets/client/img/"+monAn.getImage_path();
        Picasso.get().load(imageUrl).into(holder.anh);

        holder.tenMonAn.setText(monAn.getTenMonAn());

        double number = monAn.getGia();
        DecimalFormat formatter = new DecimalFormat("#,### đ");
        String formattedNumber = formatter.format(number);
        holder.gia.setText(formattedNumber);

        holder.soluong.setText(String.valueOf(monAn.getSoLuongDat()));

        if (monAn.getSoLuongDat() == 1) {
            holder.minus.setEnabled(false);
        }

        holder.plus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int num = monAn.getSoLuongDat() + 1;
                monAn.setSoLuongDat(num);
                setSoLuongDB(monAn);
                if (num > 1) {
                    holder.minus.setEnabled(true);
                }
                notifyDataSetChanged();
                listener.onDataChanged(tinhTongTien());
            }
        });

        holder.minus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                int num = monAn.getSoLuongDat() - 1;
                monAn.setSoLuongDat(num);
                setSoLuongDB(monAn);
                if (num == 1) {
                    holder.minus.setEnabled(false);
                }
                notifyDataSetChanged();
                listener.onDataChanged(tinhTongTien());
            }
        });

        holder.delete.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                GioHangHelper gioHangHelper = new GioHangHelper(context.getApplicationContext(), null);
                gioHangHelper.delete(monAn);
                monAnList.remove(position);
                notifyDataSetChanged();
                listener.onDataChanged(tinhTongTien());
            }
        });
    }

    public double tinhTongTien() {
        double t = 0;
        for (MonAn monAn: monAnList) {
            t += monAn.getGia() * monAn.getSoLuongDat();
        }
        return t;
    }

    public void setSoLuongDB(MonAn monAn) {
        GioHangHelper gioHangHelper = new GioHangHelper(context.getApplicationContext(), null);
        gioHangHelper.setSoluong(monAn);
    }

    @Override
    public int getItemCount() {
        return monAnList.size();
    }

    public class GioHangViewHolder extends RecyclerView.ViewHolder {
        ImageView anh;
        TextView tenMonAn, gia, soluong;
        Button plus, minus, delete;

        public GioHangViewHolder(@NonNull View itemView) {
            super(itemView);
            anh = itemView.findViewById(R.id.iv_monAn_gh);
            tenMonAn = itemView.findViewById(R.id.tv_tenMonAn_gh);
            gia = itemView.findViewById(R.id.tv_gia_gh);
            soluong = itemView.findViewById(R.id.tv_soluong_gh);
            plus = itemView.findViewById(R.id.btn_plus_gh);
            minus = itemView.findViewById(R.id.btn_minus_gh);
            delete = itemView.findViewById(R.id.btn_delete_gh);
        }
    }
}
