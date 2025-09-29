/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package asm2;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class ASM2 {

    /**
     * @param args the command line arguments
     */
    static class NhanVien {
        public String manv;
        public String hoTen;
        public double luong;

        public double getThuNhap() {
            return luong;
        }

        public double getThueTN() {
            if (luong > 15000000) return luong * 0.12;
            if (luong >= 9000000) return luong * 0.1;

            return 0;
        }

        public void xuatThongTin() {
            System.out.println("Ma nhan vien: " + manv);
            System.out.println("Ho ten: " + hoTen);
            System.out.println("Luong: " + luong);
            System.out.println();
        }
    }

    // copy trên: https://stackoverflow.com/questions/2979383/how-to-clear-the-console
    // không chạy được trên netbean
    public static void clearScreen() {  
        try {
            if (System.getProperty("os.name").contains("Windows"))
                new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor();
            else
                Runtime.getRuntime().exec("clear");
        } catch (IOException | InterruptedException ex) {}
    }  

    public static void chucNang1(ArrayList<NhanVien> nvList) {
        clearScreen();
        Scanner sc = new Scanner(System.in);
        
        do {
            NhanVien nv = new NhanVien();
            System.out.print("Moi nhap ma nhan vien: ");
            nv.manv = sc.nextLine();

            System.out.print("Moi nhap ho ten: ");
            nv.hoTen = sc.nextLine();
            
            System.out.print("Moi nhap luong: ");
            nv.luong = sc.nextDouble();
            nvList.add(nv);
            
            sc.nextLine();
            String tiepTuc;
            do {
                System.out.println("y: Tiep tuc");
                System.out.println("n: Tro ve menu");
                System.out.print("Ban co muon nhap tiep khong?: ");
                tiepTuc = sc.nextLine();
            } while (!(tiepTuc.equalsIgnoreCase("n")) && !(tiepTuc.equalsIgnoreCase("y")));

            System.out.println();
            if (tiepTuc.equalsIgnoreCase("n")) break;
        } while (true);
    }

    public static void chucNang2(ArrayList<NhanVien> nvList) {
        clearScreen();
        for (NhanVien nv : nvList)
            nv.xuatThongTin();
    }

    public static void chucNang3(ArrayList<NhanVien> nvList) {
        clearScreen();
        String ma;
        Scanner sc = new Scanner(System.in);

        System.out.print("Moi nhap ma can tim: ");
        ma = sc.nextLine();

        for (NhanVien nv : nvList)
            if (nv.manv.equalsIgnoreCase(ma)) {
                nv.xuatThongTin();
                break;
            }
    }

    public static void chucNang4(ArrayList<NhanVien> nvList) {
        clearScreen();
        String ma;
        Scanner sc = new Scanner(System.in);

        System.out.print("Moi nhap ma can xoa: ");
        ma = sc.nextLine();

        if (nvList.get(nvList.size() - 1).manv.equalsIgnoreCase(ma)) {
            nvList.remove(nvList.size() - 1);
            return;
        }

        for (NhanVien nv : nvList) 
            if (nv.manv.equalsIgnoreCase(ma)) {
                nvList.remove(nv);
                break;
            }
    }

    public static void chucNang5(ArrayList<NhanVien> nvList) {
        clearScreen();
        String ma;
        Scanner sc = new Scanner(System.in);

        System.out.print("Moi nhap ma can cap nhap: ");
        ma = sc.nextLine();

        for (NhanVien nv : nvList) {
            if (nv.manv.endsWith(ma)) {
                System.out.print("Moi nhap ma nhan vien: ");
                nv.manv = sc.nextLine();

                System.out.print("Moi nhap ho ten: ");
                nv.hoTen = sc.nextLine();
                
                System.out.print("Moi nhap luong: ");
                nv.luong = sc.nextDouble();
            }
        }
    }

    public static void chucNang6(ArrayList<NhanVien> nvList) {
        clearScreen();
        double l;
        Scanner sc = new Scanner(System.in);

        System.out.print("Moi nhap so luong can tim: ");
        l = sc.nextDouble();

        for (NhanVien nv : nvList) 
            if (nv.luong == l)
                nv.xuatThongTin();
    }

    public static void chucNang7(ArrayList<NhanVien> nvList) {
        clearScreen();
        int num_nv = nvList.size();

        for (int i = 0; i < num_nv - 1; i++) {
            for (int j = i + 1; j < num_nv; j++) {
                String[] hoTen1 = nvList.get(i).hoTen.split(" ");
                String[] hoTen2 = nvList.get(j).hoTen.split(" ");

                int indexHoTen1 = hoTen1.length - 1;
                int indexHoTen2 = hoTen2.length - 1;
                int count = 0;
                boolean isSwapped = false;
                int resultCompare = 0;

                while ((indexHoTen1 < hoTen1.length - 1 && indexHoTen2 < hoTen2.length - 1) || count == 0) {
                    resultCompare = hoTen1[indexHoTen1].compareTo(hoTen2[indexHoTen2]);

                    if (resultCompare > 0) {
                        isSwapped = true;
                        Collections.swap(nvList, i, j);
                        break;
                    } else if (resultCompare < 0) break;

                    indexHoTen1 = count;
                    indexHoTen2 = count;
                    count++;
                }
                
                if (!isSwapped && resultCompare == 0 && hoTen1.length < hoTen2.length) {
                    Collections.swap(nvList, i, j); 
                }
            }
        }
        chucNang2(nvList);
    }

    public static void chucNang8(ArrayList<NhanVien> nvList) {
        clearScreen();
        int num_nv = nvList.size();

        for (int i = 0; i < num_nv - 1; i++) {
            for (int j = i + 1; j < num_nv; j++) {
                if (nvList.get(i).getThuNhap() > nvList.get(j).getThuNhap()) {
                    Collections.swap(nvList, i, j);
                }
            }
        }

        chucNang2(nvList);
    }

    public static void chucNang9(ArrayList<NhanVien> nvList) {
        chucNang8(nvList);
        clearScreen();

        int count = 5, i = nvList.size() - 1;
        while (i >= 0 && count > 0) {
            nvList.get(i).xuatThongTin();
            count--;
            i--;
        }
    }

    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;
        ArrayList<NhanVien> nvList = new ArrayList<>();
          
        do {
            tiepTuc = "";
            clearScreen();
            System.out.println("1. Nhap danh sach sinh vien tu ban phim");
            System.out.println("2. Xuat danh sach sinh vien ra man hinh");
            System.out.println("3. Tim va hien thi nhan vien theo ma so");
            System.out.println("4. Xoa nhan vien theo ma nhap tu ban phim");
            System.out.println("5. Cap nhat thong tin nhan vien theo ma nhap tu ban phim");
            System.out.println("6. Tim cac nhan vien theo ma nhap tu ban phim");
            System.out.println("7. Sap xep nhan vien theo ho ten");
            System.out.println("8. Sap xep nhan vien theo thu nhap");
            System.out.println("9. Xuat 5 nhan vien co thu nhap cao nhat");
            System.out.println("10. Ket thuc");
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang: ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 10);

            switch (chucNang) {
                case 1: {
                    chucNang1(nvList);
                    tiepTuc = "y";
                    break;
                }

                case 2: {
                    chucNang2(nvList);
                    break;
                }

                case 3: {
                    chucNang3(nvList);
                    break;
                }

                case 4: {
                    chucNang4(nvList);
                    break;
                }

                case 5: {
                    chucNang5(nvList);
                    break;
                }

                case 6: {
                    chucNang6(nvList);
                    break;
                }

                case 7: {
                    chucNang7(nvList);
                    break;
                }
                
                case 8: {
                    chucNang8(nvList);
                    break;
                }
                
                case 9: {
                    chucNang9(nvList);
                    break;
                }

                case 10: return;
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
