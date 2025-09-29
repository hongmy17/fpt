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
 * @author Pham Quang LInh PC05353
 */
public class Lab5Bai2 {

    /**
     * @param args the command line arguments
     */
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
    
    public static void main(String[] args) {
        ArrayList<String> hoTen = new ArrayList<>();
        menu(hoTen);
    }
    
}
