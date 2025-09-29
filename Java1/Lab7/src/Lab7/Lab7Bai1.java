/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Lab7;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab7Bai1 {

    /**
     * @param args the command line arguments
     */
    static class ChuNhat {
        private double chieuDai;
        private double chieuRong;
        
        public ChuNhat(double chieuDai, double chieuRong) {
            this.chieuDai = chieuDai;
            this.chieuRong = chieuRong;
        }
        
        public double getDienTich() {
            return chieuDai * chieuRong;
        }
        
        public double getChuVi() {
            return (chieuDai + chieuRong) * 2; 
        }
        
        public double getChieuDai() {
            return chieuDai;
        }
        
        public void xuat() {
            System.out.println();
            System.out.println("Chieu dai: " + chieuDai);
            System.out.println("Chieu rong: " + chieuRong);
            System.out.println("Dien tich: " + getDienTich());
            System.out.println("Chu vi: " + getChuVi());
        }
    }
    
    static class Vuong extends ChuNhat {
        public Vuong (double canh) {
            super(canh, canh);
        }
        
        @Override
        public double getChuVi() {
            return 4 * getChieuDai();
        }
        
        @Override
        public void xuat() {
            System.out.println();
            System.out.println("Canh: " + getChieuDai());
            System.out.println("Dien tich: " + getDienTich());
            System.out.println("Chu vi: " + getChuVi());
        }
    }
    
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap chieu dai: ");
        double chieuDai = sc.nextDouble();
        
        System.out.print("Moi nhap chieu rong: ");
        double chieuRong = sc.nextDouble();
        
        System.out.print("Moi nhap canh: ");
        double canh = sc.nextDouble();
        
        ChuNhat cn = new ChuNhat(chieuDai, chieuRong);
        Vuong vu = new Vuong(canh);
        cn.xuat();
        vu.xuat();
    }
    
}
