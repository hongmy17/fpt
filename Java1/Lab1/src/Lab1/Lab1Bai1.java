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
public class Lab1Bai1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);
        System.out.print("Ho va ten: ");
        String hoTen = scanner.nextLine();
        
        System.out.print("Diem TB: ");
        double diemTB = scanner.nextDouble();
        System.out.printf("%s %f\n", hoTen, diemTB);
    }
    
}
