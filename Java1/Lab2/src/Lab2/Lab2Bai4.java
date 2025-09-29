/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab2;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Ling Pc05353
 */
public class Lab2Bai4 {

    /**
     * @param args the command line arguments
     */
    public static void giaiPTB1() {
        Scanner sc = new Scanner(System.in);
        System.out.print("He so a: ");
        double a = sc.nextDouble();
        
        System.out.print("He so b: ");
        double b = sc.nextDouble();
        
        if (a == 0) {
            if (b == 0)
                System.out.println("Phuong trinh vo so nghiem");
            else
                System.out.println("Phuong trinh vo nghiem");
        } else {
            System.out.printf("Nghiem la: %f\n", -b / a);
        }
    }
    
    public static void giaiPTB2() {
        Scanner sc = new Scanner(System.in);
        System.out.print("He so a: ");
        double a = sc.nextDouble();
        
        System.out.print("He so b: ");
        double b = sc.nextDouble();
        
        System.out.print("He so c: ");
        double c = sc.nextDouble();
        
        if (a == 0) {
            if (b == 0) {
                if (c == 0)
                    System.out.println("Phuong trinh vo so nghiem");
                else
                    System.out.println("Phuong trinh vo nghiem");
            } else {
                System.out.printf("Nghiem la: %f\n", -c / b);
            }
        } else {
            double delta = Math.pow(b, 2) - 4 * a * c;
            
            if (delta < 0) {
                System.out.println("Phuong trinh vo nghiem");
            } else if (delta  == 0) {
                System.out.printf("Phuong trinh co nghiem kep: %f\n", -b / ( 2 * a));
            } else {
                System.out.println("Phuong trinh co 2 nghiem phan biet: ");
                System.out.printf("Nghiem thu 1: %f\n", (-b + Math.sqrt(delta)) / (2 * a));
                System.out.printf("Nghiem thu 2: %f\n", (-b - Math.sqrt(delta)) / (2 * a));
            }
        }
    }
    
    public static void tinhTienDien() {
        Scanner sc =  new Scanner(System.in);
        
        int soDien;
        do {
            System.out.print("So dien: ");
            soDien = sc.nextInt();
        } while (soDien <= 0);
        
        if (soDien < 50)
            System.out.printf("So tien: %d\n", soDien * 1000);
        else
            System.out.printf("So tien: %d44\n", 50 * 1000 + (soDien - 50) * 1200);
    }
    
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;

        do {
            System.out.println("+---------------------------------------------------+");
            System.out.println("1. Giai phuong trinh bac nhat");
            System.out.println("2. Giai phuong trinh bac hai");
            System.out.println("3. Tinh tien dien");
            System.out.println("4. Ket thuc");
            System.out.println("+---------------------------------------------------+");
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang: ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 4);
            
            switch (chucNang) {
                case 1: {
                    giaiPTB1();
                    break;
                }
                
                case 2: {
                    giaiPTB2();
                    break;
                }
                
                case 3: {
                    tinhTienDien();
                    break;
                }
                
                case 4: 
                    return;
            }

            sc.nextLine();
            do {
                System.out.print("Ban muon tiep tuc khong? (y/n): ");
                tiepTuc = sc.nextLine();
            } while (!tiepTuc.equalsIgnoreCase("n") && !tiepTuc.equalsIgnoreCase("y"));
        } while (tiepTuc.equalsIgnoreCase("y"));
    }
    
}
