/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package Lab5;
import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab5Bai1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        ArrayList<Double> list = new ArrayList<>();
        
        while (true) {
            System.out.print("Moi nhap phan tu: ");
            list.add(sc.nextDouble());
            
            System.out.print("Ban co muon tiep tuc khong? (y/n): ");
            sc.nextLine();
            if (sc.nextLine().equals("n"))
                break;
        }
        
        System.out.println();
        for (double x : list)
            System.out.printf("%f ", x);
    }
    
}
