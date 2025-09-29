/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package lab3;
import java.util.Scanner;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab3Bai4 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
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
    
}
