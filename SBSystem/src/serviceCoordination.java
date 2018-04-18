import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.SpringLayout;
import javax.swing.JButton;
import java.lang.*;
public class serviceCoordination extends JFrame {

	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		
		final boolean appointmentExists;
		
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					serviceCoordination frame = new serviceCoordination();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public serviceCoordination() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		setTitle("Service Coordination");
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		SpringLayout sl_contentPane = new SpringLayout();
		contentPane.setLayout(sl_contentPane);
		
		JButton btnFindAppointment = new JButton("Find Appointment");
		sl_contentPane.putConstraint(SpringLayout.NORTH, btnFindAppointment, 10, SpringLayout.NORTH, contentPane);
		sl_contentPane.putConstraint(SpringLayout.WEST, btnFindAppointment, 0, SpringLayout.WEST, contentPane);
		contentPane.add(btnFindAppointment);
		
		JButton btnAddAppointment = new JButton("Add Appointment");
		sl_contentPane.putConstraint(SpringLayout.NORTH, btnAddAppointment, 6, SpringLayout.SOUTH, btnFindAppointment);
		sl_contentPane.putConstraint(SpringLayout.WEST, btnAddAppointment, 0, SpringLayout.WEST, contentPane);
		contentPane.add(btnAddAppointment);
		
	}
	public boolean appointmentAvailable(){
		
			
		return true;
	}
}
