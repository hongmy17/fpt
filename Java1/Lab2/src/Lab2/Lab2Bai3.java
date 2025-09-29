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
public class Lab2Bai3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
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
    
}
