/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab2;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab2Bai2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
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
    
}
