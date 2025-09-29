/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab6;

import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab6Bai4 {
    public static void chucNang1() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ho ten: ");
        String hoTen = sc.nextLine();
        
        System.out.print(hoTen);
        
        int strLen = hoTen.length();
        int i = 0;
        
        for (; i < strLen; i++)
            if (hoTen.charAt(i) == ' ') break;
        
        System.out.println("\nHo: " + (hoTen.substring(0, i)).toUpperCase());
        System.out.println("Ten diem: " + (hoTen.substring(i + 1)).toUpperCase());
    }
    
    public static void chucNang2() {
        ArrayList<Lab6Bai2.SanPham> sp = new ArrayList<>(5);
        for (int i = 0; i < 5; i++) {
            System.out.println("Moi nhap san pham thu: " + (i + 1));
            Lab6Bai2.SanPham s = new Lab6Bai2.SanPham();
            s.nhap();
            sp.add(s);
        }
        
        for (Lab6Bai2.SanPham x : sp) {
            if (x.hang.equalsIgnoreCase("nokia"))
                x.xuat();
        }
    }
    
    public static void chucNang3() {
        ArrayList<Lab6Bai3.SinhVien> sv = new ArrayList<>(5);
        
        for (int i = 0; i < 5; i++) {
            System.out.println("Moi nhap thong tin sinh vien thu: " + (i + 1));
            Lab6Bai3.SinhVien s = new Lab6Bai3.SinhVien();
            s.nhap();
            sv.add(s);
        }
    }
    
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;
          
        do {
            tiepTuc = "";
            System.out.println("1. Chuc nang 1");
            System.out.println("2. Chuc nang 2");
            System.out.println("3. Chuc nang 3");
            System.out.println("4. Ket thuc");
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang: ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 4);

            switch (chucNang) {
                case 1: {
                    chucNang1();
                    break;
                }

                case 2: {
                    chucNang2();
                    break;
                }
                
                case 3: {
                    chucNang3();
                    break;
                }

                case 4: return;
            }

            if (tiepTuc.equals("")) {
                sc.nextLine();
                do {
                    System.out.print("Ban co muon tiep tuc khong? (y/n): ");
                    tiepTuc = sc.nextLine();
                } while (!tiepTuc.equalsIgnoreCase("n") && !tiepTuc.equalsIgnoreCase("y"));
            }
        } while (tiepTuc.equalsIgnoreCase("y"));
    }
}
