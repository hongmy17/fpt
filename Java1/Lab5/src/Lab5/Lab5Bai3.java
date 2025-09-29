/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab5;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab5Bai3 {

    /**
     * @param args the command line arguments
     */
    static class SanPham {
        private String tenSp;
        private double donGia;
        private ArrayList<SanPham> sp = new ArrayList<>();
        private Scanner sc = new Scanner(System.in);
        
        public void SanPham() {}
        public void SanPham(String tenSp, double donGia) {
            this.tenSp = tenSp;
            this.donGia = donGia;
        }
        
        public void nhap() {
            while (true) {
                SanPham s = new SanPham();
                System.out.print("Ten san pham: ");
                s.tenSp = sc.nextLine();
                System.out.print("Gia: ");
                s.donGia = sc.nextDouble();
                sp.add(s);
                
                sc.nextLine();
                System.out.print("Ban co muon tiep tuc khong?(y/n): ");
                if (sc.nextLine().equals("n")) break;
            }
        }
        
        public void xuat() {
            System.out.println();
            
            for (SanPham x : sp) {
                System.out.printf("Ten: %s\n", x.tenSp);
                System.out.printf("Don gia: %f\n", x.donGia);
                System.out.println();
            }
        }
        
        public void sapXep() {
            int n = sp.size();
            
            for (int i = 0; i < n - 1; i++)
                for (int j = i + 1; j < n; j++)
                    if (sp.get(i).donGia < sp.get(j).donGia)
                        Collections.swap(sp, i ,j);
            
            xuat();
        }
        
        public void xoa() {
            System.out.print("Moi nhap san pham can xoa: ");
            String ten = sc.nextLine();
            
            int i = 0;
            for (; i < sp.size(); i++)
                if (sp.get(i).tenSp.equals(ten))
                    break;
            
            if (i >= 0)
                sp.remove(i);
        }
        
        public void xuatGiaTb() {
            double tong = 0;
            
            for (SanPham x : sp) {
                tong += x.donGia;
            }
            
            System.out.printf("Gia trung binh cua cac san pham la: %f\n", tong / sp.size());
        }
    }
    
    public static void menu() {
        Scanner sc = new Scanner(System.in);
        SanPham list = new SanPham();
        
        do {
            System.out.println("1. Nhap danh sach san pham tu ban phim");
            System.out.println("2. Sap xep giam dan theo gia va xuat ra man hinh");
            System.out.println("3. Tim va xoa san pham theo ten nhap tu ban phim");
            System.out.println("4. Xuat gia trung binh cua moi san pham");
            System.out.println("5. Ket thuc");

            int chucNang;
            do {
                System.out.print("Moi chon chuc nang(1->5): ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 5);

            switch (chucNang) {
                case 1: {
                    list.nhap();
                    break;
                }
                
                case 2: {
                    list.sapXep();
                    break;
                }
                
                case 3: {
                    list.xoa();
                    break;
                }
                
                case 4: {
                    list.xuatGiaTb();
                    break;
                }
                
                case 5: return;
            }
        } while (true);
    }
    
    public static void main(String[] args) {
        menu();
    }
    
}
