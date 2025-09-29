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
public class Lab3Bai5 {
    public static void chucNang1() {
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
    
    public static void chucNang2() {
        for (int i = 2; i < 10; i++) {
            for (int j = 1; j <= 10; j++) {
                System.out.printf("%d x %d = %d\n", i, j, i * j);
            }
            
            System.out.println();
        }
    }
    
    public static void chucNang3() {
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
    
    public static void chucNang4() {
        Scanner sc = new Scanner(System.in);
        System.out.print("Moi nhap so sinh vien: ");
        int n = sc.nextInt();
        
        String[] sinhVien = new String[n];
        double[] diem = new double[n];
        String[] hocLuc = new String[n];
        
        for (int i = 0; i < n; i++) {
            System.out.println();
            System.out.printf("Ten sinh vien thu %d: ", i + 1);
            sinhVien[i] = sc.nextLine();
            sinhVien[i] = sc.nextLine();
            System.out.printf("Diem sinh vien thu %d ", i + 1);
            diem[i] = sc.nextDouble();
        }
        
        for (int i = 0; i < n; i++) {
            if (diem[i] >= 9)
                hocLuc[i] = "Xuat sac";
            else if (diem[i] >= 7.5)
                hocLuc[i] = "Gioi";
            else if (diem[i] >= 6.5)
                hocLuc[i] = "Kha";
            else if (diem[i] >= 5)
                hocLuc[i] = "Trung binh";
            else
                hocLuc[i] = "Yeu";
        }
        
        for (int i = 0; i < n; i++) {
            System.out.println();
            System.out.printf("Thong tin sinh vien thu %d:\n", i + 1);
            System.out.printf("Ho ten: %s\n", sinhVien[i]);
            System.out.printf("Diem: %f\n", diem[i]);
            System.out.printf("Hoc luc: %s\n", hocLuc[i]);
        }
        
        for (int i = 0; i < n - 1; i++) {
            for (int j = i + 1; j < n; j++) {
                if (diem[i] > diem[j]) {
                    double tmp_diem = diem[i];
                    String tmp_sinhVien = sinhVien[i];
                    String tmp_hocLuc = hocLuc[i];
                    
                    diem[i] = diem[j];
                    diem[j] = tmp_diem;
                    
                    sinhVien[i] = sinhVien[j];
                    sinhVien[j] = tmp_sinhVien;
                    
                    hocLuc[i] = hocLuc[j];
                    hocLuc[j] = tmp_hocLuc;
                }
            }
        }
        
        System.out.println("Sau khi xap sep:");
        for (int i = 0; i < n; i++) {
            System.out.printf("Thong tin sinh vien thu %d:\n", i + 1);
            System.out.printf("Ho ten: %s\n", sinhVien[i]);
            System.out.printf("Diem: %f\n", diem[i]);
            System.out.printf("Hoc luc: %s\n", hocLuc[i]);
            System.out.println();
        }
    }
    
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String tiepTuc;
        
        do {
            System.out.println("1.Kiem tra so nguyen to");
            System.out.println("2. Xuat bang cuu chuong");
            System.out.println("3. Nhap mang so nguyen");
            System.out.println("4. Nhap 2 mang ho ten cua sinh vien");
            System.out.println("5. Ket thuc chuong trinh");
            
            int chucNang;
            do {
                System.out.print("Moi chon chuc nang: (1 - 5): ");
                chucNang = sc.nextInt();
            } while (chucNang < 1 || chucNang > 5);
            
            switch (chucNang) {
                case 1: {
                    chucNang1();
                    break;
                }
                
                case 2: {
                    chucNang2();
                    break;
                }
                
                case 3: {
                    chucNang3();
                    break;
                }
                
                case 4: {
                    chucNang4();
                    break;
                }
                
                case 5: return;
            }
            
            sc.nextLine();
            do {
                System.out.print("Ban co muon tiep tuc khong? (y/n): ");
                tiepTuc = sc.nextLine();
            } while (!tiepTuc.equalsIgnoreCase("y") && !tiepTuc.equalsIgnoreCase("n"));
        } while (tiepTuc.equalsIgnoreCase("y"));
    }
}
