/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package Lab1;
import java.util.Scanner;

/**
 *
 * @author ADMIN
 */
public class Lab1Bai4 {

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
        
        double delta = Math.pow(b, 2) - 4 * a * c;
        System.out.printf("Delta: %f\n", delta);
        System.out.printf("Can delte: %f\n", Math.sqrt(delta));
    }
    
}
