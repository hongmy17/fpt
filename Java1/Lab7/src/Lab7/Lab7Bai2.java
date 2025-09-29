/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab7;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab7Bai2 {

    /**
     * @param args the command line arguments
     */
    public static abstract class SinhVienPoly {
        public String ten;
        public String nganh;
        
        public SinhVienPoly(String ten, String nganh) {
            this.ten = ten;
            this.nganh = nganh;
        }
        
        public abstract double getDiem();
        public String getHocLuc() {
            if (getDiem() >= 9) return "Xuat sac";
            if (getDiem() >= 7.5) return "Gioi";
            if (getDiem() >= 6.5) return "Kha";
            if (getDiem() >= 5) return "Trung binh";
            return "Yeu";
        }
        
        public void xuat() {
            System.out.println();
            System.out.println("Ten: " + ten);
            System.out.println("Nganh: " + nganh);
            System.out.println("Diem: " + getDiem());
            System.out.println("Hoc luc: " + getHocLuc());
        }
    }
    
    public static void main(String[] args) {
        
    }
}
