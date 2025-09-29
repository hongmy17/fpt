/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Lab2;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab2Bai1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
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
    
}
