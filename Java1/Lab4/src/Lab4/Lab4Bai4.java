/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab4;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab4Bai4 {

    /**
     * @param args the command line arguments
     */
    static class SanPham {
        private String tenSp;
        private double donGia;
        private double giamGia;
        
        public SanPham(String tenSp, double donGia, double giamGia) {
            this.tenSp = tenSp;
            this.donGia = donGia;
            this.giamGia = giamGia;
        }
        
        public SanPham(String tenSp, double donGia) {
            this.tenSp = tenSp;
            this.donGia = donGia;
        }
        
        private double getThueNhapKhau() {
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
        
        public String getTenSp() {
            return tenSp;
        }
        
        public void setTenSp(String tenSp) {
            this.tenSp = tenSp;
        }
        
        public void setDonGia(double donGia) {
            this.donGia = donGia;
        }
        
        public double getDonGia() {
            return donGia;
        }
        
        public void setGiamGia(double giamGia) {
            this.giamGia = giamGia;
        }
        
        public double getGiamGia() {
            return giamGia;
        }
    }
    
    public static void main(String[] args) {
        // TODO code application logic here
    }
    
}
