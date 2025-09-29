/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package lab8;
import java.util.Scanner;
import lab8.Lab8Bai3.XPoly;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab8Bai4 {
    public static double[] init() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap so phan tu muon tinh: ");
        int n = sc.nextInt();
        double[] list = new double[n];
        int i = 0;

        do {
            System.out.print("Moi nhap cac gia tri can tinh: ");
            list[i] = (sc.nextDouble());
            i++;
        } while (i < n);
        
        return list;
    }
    
    public static void menu() {
        Scanner sc = new Scanner(System.in);
        double[] list;
        
        do {
            System.out.println("1. Tinh tong");
            System.out.println("2. Tim so nho nhat");
            System.out.println("3. Tim so lon nhat");
            System.out.println("4. In hoa chu cai dau");
            System.out.println("5. Ket thuc");
            System.out.println();
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang (1->5): ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 5);
            
            switch (chucNang) {
                case 1: {
                    list = init();
                    double sum = XPoly.sum(list);
                    System.out.println("Tong cua cac gia tri can tinh la: " + sum);
                    System.out.println();
                    break;
                }

                case 2: {
                    list = init();
                    double min = XPoly.min(list);
                    System.out.println("Gia tri nho nhat la: " + min);
                    System.out.println();
                    break;
                }
                
                case 3: {
                    list = init();
                    double max = XPoly.max(list);
                    System.out.println("Gia tri nho nhat la: " + max);
                    System.out.println();
                    break;
                }
                
                case 4: {
                    System.out.print("Moi nhap ten: ");
                    sc.nextLine();
                    String s = XPoly.toUpperFirstChar(sc.nextLine());
                    System.out.println(s);
                    System.out.println();
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
