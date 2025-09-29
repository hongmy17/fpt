/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package asm1;
import java.io.IOException;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class ASM1 {
    // copy trên: https://stackoverflow.com/questions/2979383/how-to-clear-the-console
    // không chạy được trên netbean
    public static void clearScreen() {  
        try {
            if (System.getProperty("os.name").contains("Windows"))
                new ProcessBuilder("cmd", "/c", "cls").inheritIO().start().waitFor();
            else
                Runtime.getRuntime().exec("clear");
        } catch (IOException | InterruptedException ex) {}
    }
    
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;
          
        do {
            clearScreen();
            System.out.println("1. Nhap danh sach sinh vien tu ban phim");
            System.out.println("2. Xuat danh sach sinh vien ra man hinh");
            System.out.println("3. Tim va hien thi nhan vien theo ma so");
            System.out.println("4. Xoa nhan vien theo ma nhap tu ban phim");
            System.out.println("5. Cap nhat thong tin nhan vien theo ma nhap tu ban phim");
            System.out.println("6. Tim cac nhan vien theo ma nhap tu ban phim");
            System.out.println("7. Sap xep nhan vien theo ho ten");
            System.out.println("8. Sap xep nhan vien theo thu nhap");
            System.out.println("9. Xuat 5 nhan vien co thu nhap cao nhat");
            System.out.println("10. Ket thuc");
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang: ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 10);

            switch (chucNang) {
                case 1: {
                    clearScreen();
                    System.out.println("Chuc nang 1: Nhap danh sach sinh vien tu ban phim");
                    break;
                }

                case 2: {
                    clearScreen();
                    System.out.println("Chuc nang 2: Xuat danh sach sinh vien ra man hinh");
                    break;
                }

                case 3: {
                    clearScreen();
                    System.out.println("Chuc nang 3: Tim va hien thi nhan vien theo ma so");
                    break;
                }

                case 4: {
                    clearScreen();
                    System.out.println("Chuc nang 4: Xoa nhan vien theo ma nhap tu ban phim");
                    break;
                }

                case 5: {
                    clearScreen();
                    System.out.println("Chuc nang 5: Cap nhat thong tin nhan vien theo ma nhap tu ban phim");
                    break;
                }

                case 6: {
                    clearScreen();
                    System.out.println("Chuc nang 6: Tim cac nhan vien theo ma nhap tu ban phim");
                    break;
                }

                case 7: {
                    clearScreen();
                    System.out.println("Chuc nang 7: Sap xep nhan vien theo ho ten");
                    break;
                }
                
                case 8: {
                    clearScreen();
                    System.out.println("Chuc nang 8: Sap xep nhan vien theo thu nhap");
                    break;
                }
                
                case 9: {
                    clearScreen();
                    System.out.println("Chuc nang 9: Xuat 5 nhan vien co thu nhap cao nhat");
                    break;
                }

                case 10: return;
            }

            sc.nextLine();
            do {
                System.out.print("Ban co muong tiep tuc khong? (y/n): ");
                tiepTuc = sc.nextLine();
            } while (!tiepTuc.equalsIgnoreCase("n") && !tiepTuc.equalsIgnoreCase("y"));
        } while (tiepTuc.equalsIgnoreCase("y"));
    }
}
