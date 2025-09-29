/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab2;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh Pc05353
 */
public class Lab2Bai5 {
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap a: ");
        double a  = sc.nextDouble();
        
        System.out.print("Moi nhap b: ");
        double b = sc.nextDouble();
        
        System.out.print("Moi nhap c: ");
        double c = sc.nextDouble();
        
        double kq = Math.pow(a, 2) + Math.pow(b, 2) + Math.pow(c, 2)
                - Math.sqrt(Math.abs(a + b + c)) / 2;
        System.out.println("Ket qua la: " + kq);
    }
    
}
