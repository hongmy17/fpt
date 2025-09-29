/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package lab8;

/**
 *
 * @author Pham Quang Linh PC05353
 */
public class Lab8Bai1 {
    final class XPoly {
        public static final double sum(double...x) {
            double sum = 0;
            
            for (double val : x)
                sum += val;
            
            return sum;
        }
    }
    
    public static void main(String[] args) {
    }
}
