/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package lab3;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Ling PC05353
 */
public class Lab3Bai1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap n: ");
        int n = sc.nextInt();
        
        boolean ok = true;
        for (int i = 2; i < n - 1; i++) {
            if (n % i == 0) {
                ok = false;
                break;
            }
        }
            
        if (ok)
            System.out.printf("%d la so nguyen to\n", n);
        else
            System.out.printf("%d khong phai so nguyen to\n", n);
    }
    
}
