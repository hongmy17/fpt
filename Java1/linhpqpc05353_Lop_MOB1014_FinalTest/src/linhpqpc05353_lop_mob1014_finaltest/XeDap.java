/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package linhpqpc05353_lop_mob1014_finaltest;

import java.util.Scanner;

/**
 *
 * @author ADMIN
 */
public class XeDap {
    private String tenXe;
    private double giaTien;
    
    public XeDap() {}
    public XeDap(String tenXe, double giaTien) {
        this.tenXe = tenXe;
        this.giaTien = giaTien;
    }
    
    public void nhap() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ten xe: ");
        tenXe = sc.nextLine();
        
        System.out.print("Moi nhap gia tien: ");
        giaTien = sc.nextDouble();
    }
    
    public void xuat() {
        System.out.println("Ten xe: " + tenXe);
        System.out.println("Gia tien: " + giaTien);
    }
    
    public double getGiaTien() {
        return giaTien;
    }
    
    public void setGiaTien(double giaTien) {
        this.giaTien = giaTien;
    }
    
    public double giamGia() {
        double giamGia = giaTien * 10 / 100;
        if (giaTien > 2000000) giamGia = giaTien * 30 / 100;
        else if (giaTien > 1000000) giamGia = giaTien * 20 / 100;
        return giamGia;
    }
    
    public  void kiemTra() {
        if (tenXe.toLowerCase().contains("Martin".toLowerCase()))
            System.out.println("Ten xe dap co chua \"Martin\"");
        else
            System.out.println("Ten xe dap khong chua \"Martin\"");
    }
    
    public void chuyenChuHoa() {
        System.out.println("Chu sau khi chuyen hoa la: " + tenXe.toUpperCase());
    }
    
    public void chuyenChuThuong() {
        System.out.println("Chu sau khi chuyen thuong la: " + tenXe.toLowerCase());
    }
    
    public static void main(String[] args) {
        XeDap xeDap = new XeDap();
        xeDap.nhap();
        xeDap.xuat();
        System.out.println("Gia: " + xeDap.getGiaTien());
        System.out.println("Giam gia: " + xeDap.giamGia());
        xeDap.kiemTra();
        xeDap.chuyenChuHoa();
        xeDap.chuyenChuThuong();
        xeDap.setGiaTien(2500000);
        System.out.println("Gia: " + xeDap.getGiaTien());
    }
}
