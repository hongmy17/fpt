/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab7;
import Lab7.Lab7Bai2.SinhVienPoly;
import Lab7.Lab7Bai3.SinhVienBiz;
import Lab7.Lab7Bai3.SinhVienIT;
import java.util.ArrayList;
import java.util.Collections;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh Pc05353
 */
public class Lab7Bai4 {

    /**
     * @param args the command line arguments
     */
    
    public static void menu() {
        Scanner sc = new Scanner(System.in);
        ArrayList<SinhVienPoly> sv = new ArrayList<>();
        
        do {
            System.out.println("1. Nhap danh sach sinh vien");
            System.out.println("2. Xuat thong tin danh sach sinh vien");
            System.out.println("3. Xuat danh sach sinh vien co hoc luc gioi");
            System.out.println("4. Sap xep danh sach sinh vien theo diem");
            System.out.println("5. Ket thuc");

            int chucNang;
            do {
                System.out.print("Moi chon chuc nang (1->5): ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 5);
            sc.nextLine();

            switch (chucNang) {
                case 1: {
                    do {
                        System.out.println();
                        System.out.print("Moi nhap ten: ");
                        String ten = sc.nextLine();

                        System.out.print("Nganh (IT / marketing): ");
                        String nganh = sc.nextLine();

                        if (nganh.equalsIgnoreCase("IT")) {
                            System.out.print("Moi nhap diem java: ");
                            double diemJava = sc.nextDouble();

                            System.out.print("Moi nhap diem Css: ");
                            double diemCss = sc.nextDouble();

                            System.out.print("Moi nhap diem HTMl: ");
                            double diemHtml = sc.nextDouble();
                            SinhVienIT s = new SinhVienIT(ten, nganh, diemJava, diemCss, diemHtml);
                            sv.add(s);
                        } else {
                            System.out.print("Moi nhap diem marketing: ");
                            double diemMarketing = sc.nextDouble();

                            System.out.print("Moi nhap diem sales: ");
                            double diemSales = sc.nextDouble();
                            SinhVienBiz s = new SinhVienBiz(ten, nganh, diemMarketing, diemSales);
                            sv.add(s);
                        }
                        
                        System.out.print("Ban co muon nhap them khong? (y/n): ");
                        sc.nextLine();
                        if (sc.nextLine().equalsIgnoreCase("n")) break;
                    } while (true);
                }

                case 2: {
                    for (SinhVienPoly x : sv) {
                        x.xuat();
                    }
                    break;
                }

                case 3: {
                    for (SinhVienPoly x : sv) {
                        if (x.getHocLuc().equalsIgnoreCase("gioi"))
                            x.xuat();
                    }
                    break;
                }

                case 4: {
                    int n = sv.size();
                    
                    for (int i = 0; i < n; i++) {
                        for (int j = i + 1; j < n; j++) {
                            if (sv.get(i).getDiem() > sv.get(j).getDiem()) {
                                Collections.swap(sv, i, j);
                            }
                        }
                    }
                    
                    for (SinhVienPoly x : sv) {
                        x.xuat();
                    }
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
