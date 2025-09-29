/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package lab3;
import java.util.Arrays;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab3Bai3 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        System.out.print("So phan tu cua mang: ");
        int n = sc.nextInt();
        
        int[] a = new int[n];
        for (int i = 0; i < n; i++) {
            System.out.printf("a[%d]: ", i);
            a[i] = sc.nextInt();
        }
        
        Arrays.sort(a);
        for (int x : a) {
            System.out.printf("%d ", x);
        }
        System.out.println();
        
        int min = a[0];
        for (int x : a) {
            if (x < min) {
                min = x;
            }
        }
        
        System.out.printf("So  nho nhat trong mang la: %d\n", min);
        
        int diem = 0;
        double tong = 0;
        
        for (int x : a) {
            if (x % 3 == 0) {
                tong += x;
                diem++;
            }
        }
        
        System.out.printf("Tong cac so chia het cho 3 la: %f\n", tong / diem);
    }
    
}
