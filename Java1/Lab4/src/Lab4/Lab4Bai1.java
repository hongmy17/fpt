/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Lab4;

import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab4Bai1 {

    /**
     * @param args the command line arguments
     */
    static class SanPham {
        public String tenSp;
        public double donGia;
        public double giamGia;
        
        public double getThueNhapKhau() {
            return 10 * donGia / 100;
        }
        
        public void nhap() {
            Scanner sc = new Scanner(System.in);
            System.out.print("Ten san pham: ");
            tenSp = sc.nextLine();
            
            System.out.print("Don gia: ");
            donGia = sc.nextDouble();
            
            System.out.print("Giam gia: ");
            giamGia = sc.nextDouble();
        }
        
        public void xuat() {
            System.out.printf("Ten san pham: %s\n", tenSp);
            System.out.printf("Don gia: %f\n", donGia);
            System.out.printf("Giam gia: %f\n", giamGia);
            System.out.printf("Thue nhap khau: %f\n", getThueNhapKhau());
        }
    }
    
    public static void main(String[] args) {
        
    }
    
}
