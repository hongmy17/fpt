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
 * @author Pham Quang Linh pc05353
 */
public class Lab5Bai4 {
    public static void chucNang1() {
        Scanner sc = new Scanner(System.in);
        ArrayList<Double> list = new ArrayList<>();
        
        while (true) {
            System.out.print("Moi nhap phan tu: ");
            list.add(sc.nextDouble());
            
            System.out.print("Ban co muon tiep tuc khong? (y/n): ");
            sc.nextLine();
            if (sc.nextLine().equals("n"))
                break;
        }
        
        System.out.println();
        for (double x : list)
            System.out.printf("%f ", x);
    }
    
    public static void nhap(ArrayList<String> list) {
        System.out.println();
        Scanner sc = new Scanner(System.in);
        
        while (true) {
            System.out.print("Moi nhap phan tu: ");
            list.add(sc.nextLine());
            
            System.out.print("Ban co muon tiep tuc khong? (y/n): ");
            if (sc.nextLine().equals("n")) break;
        }
    }
    
    public static void xuat(ArrayList<String> list) {
        for (String x : list) {
            System.out.printf("%s ", x);
        }
        
        System.out.println();
    }
    
    public static void xoa(ArrayList<String> list) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ten muon xoa: ");
        list.remove(list.indexOf(sc.nextLine()));
    }
    
    public static void menu(ArrayList<String> hoTen) {
        System.out.println();
        Scanner sc = new Scanner(System.in);
        
        System.out.println("1. Nhap danh sach ho va ten");
        System.out.println("2. Xuat danh sach vua nhap");
        System.out.println("3. Xuat danh sach ngau nhien");
        System.out.println("4. Xap sep giam dan va xuat danh sach");
        System.out.println("5. Tim va xoa ho ten nhap tu ban phim");
        System.out.println("6. Ket thuc");
        
        int chucNang;
        
        do {
            System.out.print("Moi chon chuc nang: ");
            chucNang = sc.nextInt();
        } while (chucNang < 1 || chucNang > 6);
        
        switch (chucNang) {
            case 1: {
                nhap(hoTen);
                break;
            }
            
            case 2: {
                for (String x : hoTen) {
                    System.out.printf("%s ", x);
                }
                break;
            }
            
            case 3: {
                Collections.shuffle(hoTen);
                xuat(hoTen);
                break;
            }
            
            case 4: {
                Collections.sort(hoTen);
                Collections.reverse(hoTen);
                xuat(hoTen);
                break;
            }
            
            case 5: {
                xoa(hoTen);
                break;
            }
            
            case 6: return;
        }
        
        menu(hoTen);
    }

    public static void chucNang2() {
        ArrayList<String> hoTen = new ArrayList<>();
        menu(hoTen);
    }
    
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
    
    public static void chucNang3() {
        Scanner sc = new Scanner(System.in);
        Lab5Bai3.SanPham list = new Lab5Bai3.SanPham();
        
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
