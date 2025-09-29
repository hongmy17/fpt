/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Lab6;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab6Bai1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap ho ten: ");
        String hoTen = sc.nextLine();
        
        System.out.print(hoTen);
        
        int strLen = hoTen.length();
        int i = 0;
        
        for (; i < strLen; i++)
            if (hoTen.charAt(i) == ' ') break;
        
        System.out.println("\nHo: " + (hoTen.substring(0, i)).toUpperCase());
        System.out.println("Ten diem: " + (hoTen.substring(i + 1)).toUpperCase());
    }
    
}
