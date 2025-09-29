/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package linhpqpc05353_lop_mob1014_finaltest;

import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author ADMIN
 */
public class NhanVien {
    private String maNV;
    private String tenNV;
    private int namSinh;
    private ArrayList<NhanVien> nhanVien = new ArrayList<>();
    
    public void nhap() {
        Scanner sc = new Scanner(System.in);
        NhanVien nv = new NhanVien();
        System.out.print("Moi nhap ma nhan vien (vd: NV01): ");
        nv.maNV = sc.nextLine();
        
        System.out.print("Moi nhap ten nhan vien: ");
        nv.tenNV = sc.nextLine();
        
        do {
            System.out.print("Moi nhap nam sinh nhan vien (1960 - 2005): ");
            nv.namSinh = sc.nextInt();
        } while (nv.namSinh < 1960 && nv.namSinh > 2005);
        nhanVien.add(nv);
    }
    
    public void xuat() {
        for (NhanVien nv : nhanVien) {
            System.out.println("Ma nhan vien: " + nv.maNV);
            System.out.println("Ten nhan vien: " + nv.tenNV);
            System.out.println("Nam sinh nhan vien: " + nv.namSinh);
        }
    }
    
    public void timKiemNhanVien() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ten nhan vien can tim: ");
        String ten = sc.nextLine();
        boolean hasFinded = false;
        
        for (NhanVien nv : nhanVien) {
            if (nv.tenNV.equalsIgnoreCase(ten)) {
                hasFinded = true;
                System.out.println("Ma nhan vien: " + nv.maNV);
                System.out.println("Ten nhan vien: " + nv.tenNV);
                System.out.println("Nam sinh nhan vien: " + nv.namSinh);
            }
        }
        if (!hasFinded) System.out.println("Khong tim thay nhan vien");
    }
    
    public void xoa() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ten nhan vien can xoa: ");
        String ten = sc.nextLine();
        boolean hasRemoved = false;
        
        for (NhanVien nv : nhanVien) {
            if (nv.tenNV.equalsIgnoreCase(ten)) {
                hasRemoved = true;
                nhanVien.remove(nv);
            }
        }
        if (!hasRemoved) System.out.println("Khong tim thay nhan vien");
    }
    
    public void menu() {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;
        NhanVien nv = new NhanVien();
        
        do {
            System.out.println("1. Nhap");
            System.out.println("2. Xuat");
            System.out.println("3. TIm kiem nhan vien theo ten");
            System.out.println("4. Xoa nhan vien");
            System.out.println("5. Thoat");
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang (1-5): ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 && chucNang > 5);
            
            switch (chucNang) {
                case 1: {
                    nv.nhap();
                    break;
                }
                
                case 2: {
                    nv.xuat();
                    break;
                }
                
                case 3: {
                    nv.timKiemNhanVien();
                    break;
                }
                
                case 4: {
                    nv.xoa();
                    break;
                }
                
                case 5: return;
            }
            
            do {
                System.out.print("Ban co muon tiep tuc khong? (y/n)");
                sc.nextLine();
                tiepTuc = sc.nextLine();
            } while (!tiepTuc.equalsIgnoreCase("n") && !tiepTuc.equalsIgnoreCase("y"));
        } while (tiepTuc.equalsIgnoreCase("y"));
    }
    
    public static void main(String[] args) {
        NhanVien nv  = new NhanVien();
        nv.menu();
    }
}
