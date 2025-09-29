/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Lab1;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab1Bai2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
       Scanner sc = new Scanner(System.in);
       System.out.print("Chieu dai: ");
       double chieuDai = sc.nextDouble();
       
       System.out.print("Chieu rong: ");
       double chieuRong = sc.nextDouble();
       
       System.out.printf("Chu vi: %f\n", (chieuDai + chieuRong) / 2);
       System.out.printf("Dien tich: %f\n", chieuDai * chieuRong);
       System.out.printf("Canh nho nhat: %f\n", Math.min(chieuDai, chieuRong));
    }
    
}
