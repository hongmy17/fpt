/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab6;
import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh Pc05353
 */
public class Lab6Bai2 {

    /**
     * @param args the command line arguments
     */
    static class SanPham {
        public String tenSp;
        public double gia;
        public String hang;
        
        public void nhap() {
            Scanner sc = new Scanner(System.in);
            System.out.print("Moi nhap ten: ");
            tenSp = sc.nextLine();
            
            System.out.print("Gia: ");
            gia = sc.nextDouble();
            
            System.out.print("Hang: ");
            sc.nextLine();
            hang = sc.nextLine();
        }
        
        public void xuat() {
            System.out.println();
            System.out.println("Ten san pham: " + tenSp);
            System.out.println("Gia: " + gia);
            System.out.println("Hang: " + hang);
        }
    }
    
    public static void main(String[] args) {
        ArrayList<SanPham> sp = new ArrayList<>(5);
        for (int i = 0; i < 5; i++) {
            System.out.println("Moi nhap san pham thu: " + (i + 1));
            SanPham s = new SanPham();
            s.nhap();
            sp.add(s);
        }
        
        for (SanPham x : sp) {
            if (x.hang.equalsIgnoreCase("nokia"))
                x.xuat();
        }
    }
    
}
