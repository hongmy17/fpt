/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab6;
import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab6Bai3 {

    /**
     * @param args the command line arguments
     */
    static class SinhVien {
        public String hoTen;
        public String email;
        public String sdt;
        public String cmnd;
        
        public void nhap() {
            Scanner sc = new Scanner(System.in);
            System.out.print("Moi nhap ho ten: ");
            boolean isEmail = true, isSdt = true, isCmnd = true;
            hoTen = sc.nextLine();
            
            do {
                if (!isEmail) 
                    System.out.println("Vui long nhap email");
                
                System.out.print("Moi nhap email: ");
                email = sc.nextLine();
                isEmail = false;
            } while (!email.matches("^(?=.{1,64}@)[A-Za-z0-9_-]+(\\.[A-Za-z0-9_-]+)*@[^-][A-Za-z0-9-]+(\\.[A-Za-z0-9-]+)*(\\.[A-Za-z]{2,})$"));
            
            do {
                if (!isSdt)
                    System.out.println("Vui long nhap so dien thoai");
                
                System.out.print("Moi nhap so dien thoai(9 hoac 10 so): ");
                sdt = sc.nextLine();
                isSdt = false;
            } while (!sdt.matches("0\\d{9,10}"));
            
            do {
                if (!isCmnd)
                    System.out.println("Vui long nhap so chung minh nhan dan");
                
                System.out.print("Moi nhap so chung minh nhan dan(9 so): ");
                cmnd = sc.nextLine();
                isCmnd = false;
            } while (!cmnd.matches("[0-9]{9}"));
            System.out.println();
        }
    }
    
    public static void main(String[] args) {
        ArrayList<SinhVien> sv = new ArrayList<>(5);
        
        for (int i = 0; i < 5; i++) {
            System.out.println("Moi nhap thong tin sinh vien thu: " + (i + 1));
            SinhVien s = new SinhVien();
            s.nhap();
            sv.add(s);
        }
    }
    
}
